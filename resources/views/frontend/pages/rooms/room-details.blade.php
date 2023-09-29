@extends('frontend.layouts.app')

@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        @if (isset($roomDetail))
                            {{-- {{ dd($roomDetail) }} --}}
                            <img src="{{ asset('upload/admin/room/hinh750'. $roomDetail[0]['image'] ) }}" alt="">
                            <div class="rd-text">
                                <div class="rd-title">
                                    <h3>{{ $roomDetail[0]['nameRoom'] }}</h3>
                                    <div class="rdt-right">
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                        <p href="#" style="color:red;"><i class="fa-solid fa-wifi"></i> Now</p>
                                    </div>
                                </div>
                                <h2>{{ $roomDetail[0]['price'] }}$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>

                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion {{ $roomDetail[0]['Capacity'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Type Room:</td>
                                            <td>{{ $roomDetail[0]['type_room']['typeName'] }}</td>
                                        </tr>

                                        <tr>
                                            <td class="r-o">Service:</td>
                                            <td>
                                                @if(isset($service))
                                                    @for($i = 0; $i < 2; $i++)
                                                        {{ $service[$i]['name'] . ', ' }}
                                                    @endfor
                                                @endif
                                                {{ "..." }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    {{ $roomDetail[0]['description'] }}
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="img/room/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="img/room/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="booking-form">
                        <h3>Booking Your Hotel</h3>
                        <form method="POST" action="/search">
                            @csrf
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" name="checkin" readonly class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input readonly name="checkout"type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="room">TypeRoom:</label>
                                <select id="room" name="typeroom">
                                    <option value="">Choose</option>

                                    {{-- @foreach ($typeroom as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['typeName'] }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest" name="people">
                                    <option value="">Choose</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                </select>
                            </div>

                            <button type="submit">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="search-model" style="display: none;">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
@endsection
