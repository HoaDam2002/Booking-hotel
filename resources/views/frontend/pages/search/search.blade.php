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
                @if (isset($availableRooms))
                    {{-- {{ dd($rooms) }} --}}
                    @foreach ($availableRooms as $item)
                        {{-- {{ dd($item->image) }} --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="room-item">
                                <img src="{{ asset('upload/admin/room/hinh360' . $item->image) }}" alt="">
                                <div class="ri-text">
                                    <h4>{{ $item->nameRoom }}</h4>
                                    <h3>{{ $item->price }}VND<span>/Pernight</span></h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Loại phòng:</td>
                                                <td>{{ $item->typeRoom->typeName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Số người:</td>
                                                <td>Tối đa {{ $item->Capacity }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Mô tả:</td>
                                                <td>
                                                    {!! Str::limit($item->description, '60') !!}

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

            </div>
            @if (isset($availableRooms))
                <div class="pagination-area">
                    <ul class="pagination">
                        {{ $availableRooms->links() }}
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endsection
