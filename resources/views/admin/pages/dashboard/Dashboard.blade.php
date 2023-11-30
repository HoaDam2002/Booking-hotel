@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.app')
@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistical Chart</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Payments Queue</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>NameUser</strong></th>
                                        <th><strong>RoomName</strong></th>
                                        <th><strong>CheckIn</strong></th>
                                        <th><strong>CheckOut</strong></th>
                                        <th><strong>STATUS</strong></th>
                                        <th><strong>PRICE</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($dataHisBooking))
                                        @foreach ($dataHisBooking as $value)
                                            <tr>
                                                <td>{{ $value['nameUser'] }}</td>
                                                <td>{{ $value['room']['nameRoom'] }}</td>
                                                <td>{{ Carbon::parse($value['checkIn'])->toDateString() }}</td>
                                                <td>{{ Carbon::parse($value['checkOut'])->toDateString() }}</td>

                                                @if ($value['status'] == 0)
                                                    <td><span class="badge light badge-warning">Pending</span></td>
                                                    <td>{{ $value['total'] }}$</td>

                                                @endif

                                                @if ($value['status'] == 1)
                                                    <td><span class="badge light badge-danger">Canceled</span></td>
                                                    <td>{{ $value['total'] }}$</td>

                                                @endif

                                                @if ($value['status'] == 2)
                                                    <td><span class="badge light badge-success">Successful</span></td>
                                                    <td>{{ $value['total'] }}$</td>

                                                @endif
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
    </div> --}}
    <div class="container-fluid">
        {{-- <div class="form-head d-flex mb-3 mb-md-5 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h3 class="text-primary font-w600">Welcome to Mediqu!</h3>
                <p class="mb-0">Hospital Admin Dashboard Template</p>
            </div>

            <div class="input-group search-area ml-auto d-inline-flex">
                <input type="text" class="form-control" placeholder="Search here">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="flaticon-381-search-2"></i></span>
                </div>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary ml-3"><i class="flaticon-381-settings-2 mr-0"></i></a>
        </div> --}}
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="row">
                    <!-- <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12"> -->
                    <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">SALE/PROJECT</h4>
                                <div class="dropdown ml-auto">
                                    <div class="btn-link" data-toggle="dropdown">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="recovered-chart-deta d-flex">
                                    <div class="col">
                                        <span class="bg-danger"></span>
                                        <div>
                                            <p>SALE</p>
                                            <h5>451</h5>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <span class="bg-success"></span>
                                        <div>
                                            <p>PROJECTS</p>
                                            <h5>623</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 px-3 pb-3">
                                <div id="chartTimeline"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">PRODUCTS</h4>
                                <div class="dropdown ml-auto">
                                    <div class="btn-link" data-toggle="dropdown">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-3 pt-2">
                                <div id="chartStrock"></div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">SALARY (%)</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle light" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Weekly
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Daily</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <h4 class="text-dark font-w400">Total Staff</h4>
                                <h3 class="text-primary font-w600">562,084 People</h3>
                                <div class="row mx-0 align-items-center">
                                    <div class="col-sm-8 col-md-7  px-0">
                                        <div id="chartCircle"></div>
                                    </div>
                                    <div class="col-sm-4 col-md-5 px-0">
                                        <div class="patients-chart-deta">
                                            <div class="col px-0">
                                                <span class="bg-danger"></span>
                                                <div>
                                                    <p>Paid</p>
                                                    <h3>64%</h3>
                                                </div>
                                            </div>
                                            <div class="col px-0">
                                                <span class="bg-success"></span>
                                                <div>
                                                    <p>Not Yet Paid</p>
                                                    <h3>73%</h3>
                                                </div>
                                            </div>
                                            <div class="col px-0">
                                                <span class="bg-warning"></span>
                                                <div>
                                                    <p>In Treatment</p>
                                                    <h3>48%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Recent Patient Activity</h4>
                                <div class="dropdown ml-auto">
                                    <div class="btn-link" data-toggle="dropdown">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table patient-activity">
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="mr-3 img-fluid rounded" width="78"
                                                        src="./images/avatar/1.jpg" alt="DexignZone">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1">Media heading</h5>
                                                        <p class="mb-0">41 Years Old</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Disease</p>
                                                <h5 class="my-0 text-primary">Allergies & Asthma</h5>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-1">Status</p>
                                                        <h5 class="mt-0 mb-1 text-success">Recovered</h5>
                                                        <small>22/03/2020 12:34 AM</small>
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="12" cy="5"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="mr-3 img-fluid rounded" width="78"
                                                        src="./images/avatar/2.jpg" alt="DexignZone">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1">Angela Nurhayati</h5>
                                                        <p class="mb-0">21 Years Old</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Disease</p>
                                                <h5 class="my-0 text-primary">Sleep Problem</h5>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-1">Status</p>
                                                        <h5 class="mt-0 mb-1 text-danger">New Patient</h5>
                                                        <small>22/03/2020 12:34 AM</small>
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="12" cy="5"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="active">
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="mr-3 img-fluid rounded" width="78"
                                                        src="./images/avatar/3.jpg" alt="DexignZone">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1">James Robinson</h5>
                                                        <p class="mb-0">25 Years Old</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Disease</p>
                                                <h5 class="my-0 text-primary">Dental Care</h5>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-1">Status</p>
                                                        <h5 class="mt-0 mb-1 text-warning">In Treatment</h5>
                                                        <small>22/03/2020 12:34 AM</small>
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="12" cy="5"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="mr-3 img-fluid rounded" width="78"
                                                        src="./images/avatar/4.jpg" alt="DexignZone">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1">Thomas Jaja</h5>
                                                        <p class="mb-0">7 Years Old</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Disease</p>
                                                <h5 class="my-0 text-primary">Diabetes</h5>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-1">Status</p>
                                                        <h5 class="mt-0 mb-1 text-danger">New Patient</h5>
                                                        <small>22/03/2020 12:34 AM</small>
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="12" cy="5"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="mr-3 img-fluid rounded" width="78"
                                                        src="./images/avatar/5.jpg" alt="DexignZone">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1">Cindy Brownleee</h5>
                                                        <p class="mb-0">71 Years Old</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Disease</p>
                                                <h5 class="my-0 text-primary">Covid-19 Suspect</h5>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-1">Status</p>
                                                        <h5 class="mt-0 mb-1 text-success">Recovered</h5>
                                                        <small>22/03/2020 12:34 AM</small>
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="12" cy="5"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <img class="mr-3 img-fluid rounded" width="78"
                                                        src="./images/avatar/6.jpg" alt="DexignZone">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1">Oconner Jr.</h5>
                                                        <p class="mb-0">17 Years Old</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Disease</p>
                                                <h5 class="my-0 text-primary">Dental Care</h5>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-1">Status</p>
                                                        <h5 class="mt-0 mb-1 text-warning">In Treatment</h5>
                                                        <small>22/03/2020 12:34 AM</small>
                                                    </div>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="12" cy="5"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19"
                                                                        r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 text-center">
                                <a href="#" class="btn-link">See More >></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                {{-- <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-danger">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-calendar-1"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Appointment</p>
                                        <h3 class="text-white">76</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-success">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-diamond"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Hospital Earning</p>
                                        <h3 class="text-white">$56K</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-info">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-heart"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Total Patient</p>
                                        <h3 class="text-white">783K</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-user-7"></i>
                                    </span>
                                    <div class="media-body text-white text-right">
                                        <p class="mb-1">Doctor</p>
                                        <h3 class="text-white">$76</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Revenue</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle light"
                                        data-toggle="dropdown" aria-expanded="false">
                                        2020
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">2023</a>
                                        <a class="dropdown-item" href="#">2022</a>
                                        <a class="dropdown-item" href="#">2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <h3 class="text-primary font-w600">$41,512k <small class="text-dark ml-2">$25,612k</small>
                                </h3>
                                <div id="chartBar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Top 5 Best Staff</h4>
                                <a class="btn-link ml-auto" href="#">More >></a>
                            </div>
                            <div class="card-body">
                                <div class="widget-media best-doctor">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-4">
                                                    <img alt="image" width="90" src="{{ asset('assets_admin/images/avatar/1.jpg')}}">
                                                    <div class="number">#1</div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="mb-2">Dr. Samantha Queque</h4>
                                                    <p class="mb-2 text-primary">Gynecologist</p>
                                                    <div class="star-review">
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <span class="ml-3">451 reviews</span>
                                                    </div>
                                                </div>
                                                <div class="social-media">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel active">
                                                <div class="media mr-4">
                                                    <img alt="image" width="90" src="{{ asset('assets_admin/images/avatar/2.jpg')}}">
                                                    <div class="number">#2</div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="mb-2">Dr. Abdul Aziz Lazis</h4>
                                                    <p class="mb-2 text-primary">Physical Therapy</p>
                                                    <div class="star-review">
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <span class="ml-3">238 reviews</span>
                                                    </div>
                                                </div>
                                                <div class="social-media">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-4">
                                                    <img alt="image" width="90" src="{{ asset('assets_admin/images/avatar/3.jpg')}}">
                                                    <div class="number">#3</div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="mb-2">Dr. Samuel Jr.</h4>
                                                    <p class="mb-2 text-primary">Dentist</p>
                                                    <div class="star-review">
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <span class="ml-3">300 reviews</span>
                                                    </div>
                                                </div>
                                                <div class="social-media">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-4">
                                                    <img alt="image" width="90" src="{{ asset('assets_admin/images/avatar/4.jpg')}}">
                                                    <div class="number">#4</div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="mb-2">Dr. Alex Siauw</h4>
                                                    <p class="mb-2 text-primary">Physical Therapy</p>
                                                    <div class="star-review">
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <i class="fa fa-star text-gray"></i>
                                                        <span class="ml-3">451 reviews</span>
                                                    </div>
                                                </div>
                                                <div class="social-media">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-4">
                                                    <img alt="image" width="90" src="{{ asset('assets_admin/images/avatar/5.jpg')}}">
                                                    <div class="number">#5</div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="mb-2">Dr. Jennifer Ruby</h4>
                                                    <p class="mb-2 text-primary">Nursingc</p>
                                                    <div class="star-review">
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <i class="fa fa-star text-orange"></i>
                                                        <span class="ml-3">700 reviews</span>
                                                    </div>
                                                </div>
                                                <div class="social-media">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="card-footer border-0 pt-0 text-center">
                                <a href="#" class="btn-link">See More >></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script>
        var myArray = @json($sumRevenues);
        console.log(typeof myArray);
        let revenue = [];
        Object.keys(myArray).forEach(value => {
            revenue.push(myArray[value]);
        });

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: "bar",
            data: {
                defaultFontFamily: "Poppins",
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Total revenue",
                    data: revenue,
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(240, 255, 240)',
                        'rgb(255, 240, 245)',
                        'rgb(255, 204, 153)',
                        'rgb(221, 196, 136)',
                        'rgb(0, 128, 128)'
                    ],
                    borderWidth: "2",
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.1)',
                        'rgba(255, 159, 64, 0.1)',
                        'rgba(255, 205, 86, 0.1)',
                        'rgba(75, 192, 192, 0.1)',
                        'rgba(54, 162, 235, 0.1)',
                        'rgba(153, 102, 255, 0.1)',
                        'rgba(201, 203, 207, 0.1)',
                        'rgba(240, 255, 240, 0.1)',
                        'rgba(255, 240, 245, 0.1)',
                        'rgba(255, 204, 153, 0.1)',
                        'rgba(221, 196, 136, 0.1)',
                        'rgba(0, 128, 128, 0.1)'
                    ],
                }, ],
            },
            options: {
                legend: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 1000,
                            min: 0,
                            stepSize: 50,
                            padding: 5,
                        },
                    }, ],
                    xAxes: [{
                        ticks: {
                            padding: 5,
                        },
                    }, ],
                },
            },
        });
    </script> --}}
@endsection
