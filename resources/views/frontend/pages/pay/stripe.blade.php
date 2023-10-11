@extends('frontend.layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 350px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment Stripe</div>

                    <div class="card-body">
                        <form action="{{ url('payment') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="stripeEmail">Email:</label>
                                <input type="email" name="stripeEmail" value="{{ Auth::user()->email }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="stripeToken">Credit Card:</label>
                                <div id="card-element"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Pay ${{ $total }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Stripe.js to initialize Stripe Elements -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Initialize Stripe.js
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Create a card Element and add it to the form
        var card = elements.create('card');
        card.mount('#card-element');
    </script>
@endsection
