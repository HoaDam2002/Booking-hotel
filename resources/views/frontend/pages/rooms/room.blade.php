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
            <div class="row">
                @if (isset($rooms))
                    {{-- {{ dd($rooms) }} --}}
                    @foreach ($rooms as $item)
                        {{-- {{ dd($item->image) }} --}}
                        @php
                            $image = json_decode($item->image, true);
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="room-item">
                                <img src="{{ asset('upload/admin/room/hinh360' . $image[0]) }}" alt="">
                                <div class="ri-text">
                                    <h4>{{ $item->nameRoom }}</h4>
                                    <h3>{{ $item->price }}$<span>/Pernight</span></h3>
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
                                            <tr>
                                                <td class="r-o">Service:</td>
                                                <td>
                                                    @if (isset($service))
                                                        @for ($i = 0; $i < 2; $i++)
                                                            {{ $service[$i]['name'] . ', ' }}
                                                        @endfor
                                                        {{ '...' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ url('room/detail/' . $item->id) }}" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{ $rooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
