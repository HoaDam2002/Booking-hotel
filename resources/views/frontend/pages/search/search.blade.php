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
    <section class="rooms-section spad">
        <div class="container">
            <div style="width: 50%; margin: auto;">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissble">
                        {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
                        <h4>NOTEFICATION</h4>
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissble">
                        {{-- <button type="button"F class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
                        <h4>NOTEFICATION</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="booking-form">
                    <h3>Booking Your Hotel</h3>
                    <form action="">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" name="checkIn" value="{{ $dateIn }}" readonly class="date-input"
                                id="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input readonly name="checkOut" value="{{ $dateOut }}" type="text" class="date-input"
                                id="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="room">TypeRoom:</label>
                            <select id="room" name="typeroom">
                                <option value="">Choose</option>

                                @foreach ($roomType as $value)
                                    <option value="{{ $value['id'] }}">{{ $value['typeName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select id="guest" name="people">
                                <option value="">Choose</option>
                                <option value="1">1 person</option>
                                <option value="2">2 person</option>
                                <option value="3">3 person</option>
                                <option value="4">4 person</option>
                                <option value="5">5 person</option>
                                <option value="6">More person</option>
                            </select>
                        </div>

                        <button id="search">Check Availability</button>
                    </form>
                </div>
            </div>
            <div style="margin: auto; margin-left: 150px; display: flex; flex-direction: row;">
                <p style="margin-right: 10px;">
                    Your Search is:
                </p>
                <p style="color: rgb(51, 14, 213); margin-right: 7px;" id="checkin">
                    Check In: {{ $dateIn }};
                </p>
                <p style="color: rgb(206, 117, 23); margin-right: 7px;" id="checkout">
                    Check Out: {{ $dateOut }}
                </p>
                <p style="color: rgb(7, 134, 45); margin-right: 7px;" id="capacity">
                    {{ !empty($capacity) ? '; Max person: ' . $capacity : '' }}
                </p>
                <p style="color: rgb(84, 8, 150);" id="typeRoom">
                    {{ !empty($type) ? '; Type Room: ' . $type[0]['typeName'] : '' }}
                </p>
            </div>


            <div id="render" class="row">
                @if (isset($availableRooms))
                    @foreach ($availableRooms as $item)
                        @php
                            $image = json_decode($item->image, true);
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            {{-- {{ dd($item->image) }} --}}
                            <div class="room-item">
                                <img src="{{ asset('upload/admin/room/hinh360' . $image[0]) }}" alt="">
                                <div class="ri-text">
                                    <h4>{{ $item->nameRoom }}</h4>
                                    <h3>{{ $item->price }}VND<span>/Pernight</span></h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Type Room:</td>
                                                <td>{{ $item->typeRoom->typeName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max persion {{ $item->Capacity }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Description:</td>
                                                <td>
                                                    {!! Str::limit($item->description, '60') !!}

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ url('pay/' . $item->id) }}" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

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

            $('button#search').click(function(e) {
                e.preventDefault();

                let checkIn = $(this).closest('div.booking-form').find('input#date-in').val();
                let checkOut = $(this).closest('div.booking-form').find('input#date-out').val();
                let people = $(this).closest('div.booking-form').find('select#guest').val();
                let typeroom = $(this).closest('div.booking-form').find('select#room').val();

                let nametype = $(this).closest('div.booking-form').find('select#guest option:selected').text();
                let type = $(this).closest('div.booking-form').find('select#room option:selected').text();

                $('p#checkin').text('Check In: ' + checkIn + ';')
                $('p#checkout').text('Check In: '+ checkOut)

                if(nametype != 'Choose' && type != ''){
                    $('p#capacity').text('; Max person :' + nametype)
                }else{
                    $('p#capacity').text('')

                }

                if(type != 'Choose' && type != ''){
                    $('p#typeRoom').text('; Type Room :' + type)
                }else{
                    $('p#typeRoom').text('')
                }


                $.ajax({
                    url: "{{ url('search/inSearchPage') }}", // Sử dụng route thay vì url
                    type: 'POST',
                    data: {
                        checkIn: checkIn,
                        checkOut: checkOut,
                        people: people,
                        typeroom: typeroom,
                        _token: "{{ csrf_token() }}" // Thêm token CSRF để bảo vệ khỏi lỗ hổng CSRF
                    },
                    success: function(res) {
                        let data = res.data;
                        console.log(data)
                        let html = '';

                        data.map(function(item) {
                            let image = JSON.parse(item.image);
                            image = image[0];
                            let img = "{{ asset('upload/admin/room/hinh360/') }}" +
                                image;
                            let url = "{{ url('pay/') }}/" + item.id;

                            html += '<div class="col-lg-4 col-md-6">' +
                                '<div class="room-item">' +
                                '<img src="' + img + '" alt="">' +
                                '<div class="ri-text">' +
                                '<h4>' + item.nameRoom + '</h4>' +
                                '<h3>' + item.price +
                                ' VND<span>/Pernight</span></h3>' +
                                '<table>' +
                                '<tbody>' +
                                '<tr>' +
                                '<td class="r-o">Loại phòng:</td>' +
                                '<td>' + item.type_room.typeName + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="r-o">Số người:</td>' +
                                '<td>Tối đa ' + item.Capacity + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="r-o">Mô tả:</td>' +
                                '<td>' + item.description.substr(0, 60) + '</td>' +
                                '</tr>' +
                                '</tbody>' +
                                '</table>' +
                                '<a href="' + url +
                                '" class="primary-btn">More Details</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        });

                        $('div#render').html(html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                    }
                });
            });

        });
    </script>
@endsection
