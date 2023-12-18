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
                        <div class="col-xl-5 mb-6">
                            <div class="example">
                                <p class="mb-1">Choose Checkin - Checkout Day</p>
                                <form style="display: flex">
                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange"
                                        value={{ $dayNow . '-' . $nextDay }} min={{ $currentDay }}>
                                    {{-- <a class="btn btn-outline-info" style="margin-left: 10px">Search</a> --}}
                                    <button type="submit" class="btn btn-outline-info"
                                        style="margin-left: 10px">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div style='text-align: center'>
                        <h3>Room Not Found</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row m-b-30">
                                        <div class="col-md-5 col-xxl-12">
                                            <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                <div class="new-arrivals-img-contnent">
                                                    <img class="img-fluid"
                                                        src="https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xxl-12">
                                            <div class="new-arrival-content position-relative">
                                                <h4>Solid Women's V-neck Dark T-Shirt</h4>
                                                <p class="price">$320.00</p>
                                                <p>Availability: <span class="item"> In stock <i
                                                            class="fa fa-check-circle text-success"></i></span></p>
                                                <p>Product code: <span class="item">0405689</span> </p>
                                                <p>Brand: <span class="item">Lee</span></p>
                                                <p class="text-content">There are many variations of passages of Lorem Ipsum
                                                    available, but the majority have suffered alteration in some form, by
                                                    injected humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum.</p>
                                                <div class="comment-review star-rating text-right">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star-half-empty"></i></li>
                                                        <li><i class="fa fa-star-half-empty"></i></li>
                                                    </ul>
                                                    <span class="review-text">(34 reviews) / </span><a
                                                        class="product-review" href="">Write a review?</a>
                                                </div>
                                                <button class="btn btn-primary"><a href="/admin/infopayment"
                                                        style="color: inherit">BOOK
                                                        NOW</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row m-b-30">
                                        <div class="col-md-5 col-xxl-12">
                                            <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                <div class="new-arrivals-img-contnent">
                                                    <img class="img-fluid"
                                                        src="https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xxl-12">
                                            <div class="new-arrival-content position-relative">
                                                <h4>Solid Women's V-neck Dark T-Shirt</h4>
                                                <p class="price">$325.00</p>
                                                <p>Availability: <span class="item"> In stock <i
                                                            class="fa fa-check-circle text-success"></i></span></p>
                                                <p>Product code: <span class="item">0405689</span> </p>
                                                <p>Brand: <span class="item">Lee</span></p>
                                                <p class="text-content">There are many variations of passages of Lorem Ipsum
                                                    available, but the majority have suffered alteration in some form, by
                                                    injected humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum.</p>
                                                <div class="comment-review star-rating text-right">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star-half-empty"></i></li>
                                                        <li><i class="fa fa-star-half-empty"></i></li>
                                                    </ul>
                                                    <span class="review-text">(34 reviews) / </span><a
                                                        class="product-review" href="">Write a review?</a>
                                                </div>
                                                <button class="btn btn-primary"><a href="/admin/infopayment"
                                                        style="color: inherit">BOOK
                                                        NOW</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@endsection
