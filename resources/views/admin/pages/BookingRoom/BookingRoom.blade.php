@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">BOOKING ROOM</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 mb-6">
                            <div class="example">
                                <p class="mb-1">Choose Checkin - Checkout Day</p>

                                <form id="form" style="display: flex">
                                    <input type="date" name="checkin" class="form-control checkin" id="datepicker"
                                        placeholder="CheckIn" />
                                    <input type="date" name="checkout" class="form-control checkout" id="datepicker"
                                        placeholder="CheckOut" />

                                    <button type="submit" class="btn btn-outline-info btn-submit"
                                        style="margin-left: 10px">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row " id="list-room">

                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">CUSTOMER INFOMATION</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Name Customer</label>
                                            <input type="text" name="firstName" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone</label>
                                            <input type="text" name="lastName" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email</label>
                                            <input type="email" class="form-control" id="inputGroupPrepend2"
                                                aria-describedby="inputGroupPrepend2" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Room Name</label>
                                            <input type="email" class="form-control" id="inputGroupPrepend2"
                                                aria-describedby="inputGroupPrepend2" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Checkin</label>
                                            <input type="text" name="firstName" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Checkout</label>
                                            <input type="text" name="lastName" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total</label>
                                            <input type="email" class="form-control" id="inputGroupPrepend2"
                                                aria-describedby="inputGroupPrepend2" required="">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            const currentDate = new Date();
            var formattedDate = currentDate.toISOString().slice(0, 10);
            console.log(formattedDate)
            $('.checkin').attr('min', formattedDate)
            $('.checkout').attr('min', formattedDate)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();

                let checkin = $('.checkin').val();
                let checkout = $('.checkout').val();
                console.log(checkin)
                $.ajax({
                    url: "{{ url('admin/bookingroom') }}",
                    type: 'POST',
                    data: {
                        checkin: checkin,
                        checkout: checkout,
                        _token: "{{ csrf_token() }}"
                    },
                    success: (res) => {
                        let html = "";
                        if (res.data.length > 0) {
                            Object.keys(res.data).map(value => {
                                let data = res.data[value]
                                let image = JSON.parse(data.image);
                                image = image[0];
                                image = "{{ asset('upload/admin/room/hinh360') }}" +
                                    image;

                                let des = '';
                                if (data.description.length > 200) {
                                    des = data.description.substring(0, 200) + "...";
                                } else {
                                    des = data.description
                                }

                                html += '<div class="col-lg-12 col-xl-6">' +
                                    '<div class="card">' +
                                    '<div class="card-body">' +
                                    '<div class="row m-b-30">' +
                                    '<div class="col-md-5 col-xxl-12">' +
                                    '<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">' +
                                    '<div class="new-arrivals-img-contnent">' +
                                    '<img class="img-fluid"' +
                                    'src=' + image +
                                    ' alt=""/>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-md-7 col-xxl-12">' +
                                    '<div class="new-arrival-content position-relative">' +
                                    '<h4>' + data.nameRoom + '</h4>' +
                                    '<span class="price">' + data.price +
                                    '$</span><span> / pernight</span>' +
                                    // '<p>Capacity:' + data.Capacity + '</p>' +
                                    '<p class="text-content">' + des + '</p>' +
                                    '<button class="btn btn-primary"><a href="/admin/infopayment"' +
                                    'style="color: inherit">BOOK' +
                                    'NOW</a></button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            });

                            $('#list-room').html(html);
                        } else {
                            $('#list-room').html(
                                '<div style="margin: auto"><h3>Room Not Found</h3></div>'
                            );

                        }
                    }
                })
            })
        })
    </script>
@endsection
