@extends('frontend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">MY BOOKINGS</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Number</strong></th>
                                    <th><strong>Name Customer</strong></th>
                                    <th><strong>Capacity</strong></th>
                                    <th><strong>Name Room</strong></th>
                                    <th><strong>Price</strong></th>
                                    <th><strong>Type Room</strong></th>
                                    <th><strong>Check-In</strong></th>
                                    <th><strong>Check-Out</strong></th>
                                    <th><strong>Booked At</strong></th>
                                    <th><strong>Total</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = 0
                                @endphp
                                @if (isset($booking))
                                    @foreach ($booking as $item)
                                        @php
                                            $number++;
                                            $checkIn = date('d-m-y H:i a', strtotime($item['checkIn']));
                                            $checkOut = date('d-m-y H:i a', strtotime($item['checkOut']));
                                            $booktime = date('d-m-y H:i a', strtotime($item['created_at']));
                                        @endphp
                                        <tr>
                                            <td class="descBlogs">{{ $number }}</td>
                                            <td class="descBlogs">{{ $item['nameUser'] }}</td>
                                            <td class="descBlogs">Max persion {{ $item['room']['Capacity'] }}</td>
                                            <td class="descBlogs">{{ $item['room']['nameRoom'] }}</td>
                                            <td class="descBlogs">{{ $item['room']['price'] }}$/Pernight</td>
                                            <td class="descBlogs">{{ $item['room']['type_room']['typeName'] }}</td>
                                            <td class="descBlogs">{{ $checkIn }}</td>
                                            <td class="descBlogs">{{ $checkOut }}</td>
                                            <td class="descBlogs">{{ $booktime }}</td>
                                            <td class="descBlogs">{{ $item['total'] }}$</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
