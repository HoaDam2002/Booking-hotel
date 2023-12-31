@php
    use Carbon\Carbon;
@endphp
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
                                                    {{-- <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-warning light sharp"
                                                                data-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
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
                                                    </td> --}}
                                                @endif

                                                @if ($value['status'] == 1)
                                                    <td><span class="badge light badge-danger">Canceled</span></td>
                                                    <td>{{ $value['total'] }}$</td>
                                                    {{-- <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-danger light sharp"
                                                                data-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
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
                                                    </td> --}}
                                                @endif

                                                @if ($value['status'] == 2)
                                                    <td><span class="badge light badge-success">Successful</span></td>
                                                    <td>{{ $value['total'] }}$</td>
                                                    {{-- <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp"
                                                                data-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
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
                                                    </td> --}}
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
    </script>
@endsection
