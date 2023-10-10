<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\HistoryBooking;

use Auth;
use Exception;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripePaymentsController extends Controller
{
    public function index()
    {
        $data = [];

        if (session()->has('payment')) {
            $data = session()->get('payment');
        }

        $total = $data['total'];
        $numberOfdays = $data['numberOfDays'];

        return view('frontend.pages.pay.stripe', compact('total'));
    }
    public function payment(Request $request)
    {
        $data = [];

        if (session()->has('payment')) {
            $data = session()->get('payment');
        }

        $total = $data['total'];
        $numberOfdays = $data['numberOfDays'];

        $bookings = $data['room'];

        $bookings['idRoom'] = $bookings['id'];

        unset($bookings['total']);
        unset($bookings['numberOfDays']);

        unset($bookings['id']);
        unset($bookings['nameRoom']);
        unset($bookings['Capacity']);
        unset($bookings['typeroom']);
        unset($bookings['price']);
        unset($bookings['checkInView']);
        unset($bookings['checkOutView']);
        unset($bookings['created_at']);
        unset($bookings['updated_at']);
        unset($bookings['type_room']);
        unset($bookings['numberOfDays']);
        unset($bookings['roomTypeId']);
        unset($bookings['idHotel']);
        unset($bookings['image']);

        $bookings['idUser'] = Auth::user()->id;
        $bookings['nameUser'] = Auth::user()->name;
        $bookings['phone'] = Auth::user()->phone;
        $bookings['emailUser'] = Auth::user()->email;

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Customer::create(
                array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                )
            );
            $charge = Charge::create(
                array(
                    'customer' => $customer->id,
                    'amount' => $total,
                    'currency' => 'usd'
                )
            );

            $his = $bookings;
            $his['status'] = 1;

            Bookings::create($bookings);
            HistoryBooking::created($his);

            return redirect()->route('complete');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function complete()
    {
        return view('complete');
    }
}
