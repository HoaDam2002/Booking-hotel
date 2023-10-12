@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistical Chart</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="areaChart_2"></canvas>
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
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>Name</strong></th>

                                        <th><strong>DATE</strong></th>
                                        <th><strong>STATUS</strong></th>
                                        <th><strong>PRICE</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>01</strong></td>
                                        <td>Paris</td>

                                        <td>01 August 2020</td>
                                        <td><span class="badge light badge-success">Successful</span></td>
                                        <td>$21.56</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                    data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>02</strong></td>
                                        <td>Toronto</td>

                                        <td>01 August 2020</td>
                                        <td><span class="badge light badge-danger">Canceled</span></td>
                                        <td>$21.56</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-danger light sharp"
                                                    data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>03</strong></td>
                                        <td>New York</td>

                                        <td>01 August 2020</td>
                                        <td><span class="badge light badge-warning">Pending</span></td>
                                        <td>$21.56</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-warning light sharp"
                                                    data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var myArray = @json($sumRevenues);
        console.log(typeof myArray);
        let revenue = [];
        Object.keys(myArray).forEach(value => {
            revenue.push(myArray[value]);
        });

        if (jQuery("#areaChart_2").length > 0) {
            const areaChart_2 = document.getElementById("areaChart_2").getContext("2d");

            areaChart_2.height = 100;

            new Chart(areaChart_2, {
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
                                max: 100000,
                                min: 0,
                                stepSize: 10000,
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
        }
    </script>
@endsection
