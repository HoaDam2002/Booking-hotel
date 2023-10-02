@extends('frontend.layouts.app')

@section('content')
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-text">
                        <h2>Your Booking</h2>
                        <h3 id="total" style="color: red">Total: {{ $total }}$</h3>
                        <table>

                            <tbody>
                                <tr>
                                    <td class="c-o">Name: </td>
                                    <td class="">{{ $room->nameRoom }}</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Capacity:</td>
                                    <td>Max persion {{ $room->Capacity }}</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Type:</td>
                                    <td>{{ $room->typeRoom->typeName }}</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Check In:</td>
                                    <td>{{ $room->checkInView }}</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Check Out:</td>
                                    <td>{{ $room->checkOutView }}</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Price:</td>
                                    <td>{{ $room->price }}$/Pernight</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-primary" id="booking">Booking now</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @php
                    $image = json_decode($room->image);
                @endphp
                <section class="testimonial-section spad col-lg-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <span>About your room</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="testimonial-slider owl-carousel">
                                @foreach ($image as $item)
                                    <div class="ts-item">
                                        <img src="{{ asset('upload/admin/room/hinh750' . $item) }}" alt="">
                                        <div class="ti-author">
                                            <div class="rating">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star-half_alt"></i>
                                            </div>
                                            <h5> - Alexander Vasquez</h5>
                                        </div>
                                        <img src="{{ asset('frontend/img/testimonial-logo.png') }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('button#booking').click(function() {
                let idUser = "{{ Auth::user()->id }}"
                let nameUser = "{{ Auth::user()->name }}"
                let idRoom = "{{ $room->id }}"
                let phone = "{{ Auth::user()->phone }}"
                let emailUser = "{{ Auth::user()->email }}"
                let checkIn = "{{ $room->checkIn }}"
                let checkOut = "{{ $room->checkOut }}"
                let total = $(this).closest('div.contact-text').find('h3#total').text()
                total = parseInt(total.match(/\d+/)[0]);

                $.ajax({
                    url: "{{ url('/pay/paying') }}",
                    type: 'POST',
                    data: {
                        idUser: idUser,
                        nameUser: nameUser,
                        idRoom: idRoom,
                        phone: phone,
                        emailUser: emailUser,
                        checkIn: checkIn,
                        checkOut: checkOut,
                        total: total
                    },
                    success: function(data) {
                       alert('Success');
                    },
                    error: function(e) {
                        console.log(e.message);
                    }
                })
            })
        })
    </script>
@endsection
