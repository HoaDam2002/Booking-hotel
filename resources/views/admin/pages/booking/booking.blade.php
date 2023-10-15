@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">BOOKING</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Room Name</strong></th>
                                    <th><strong>User Name</strong></th>
                                    <th><strong>Phone</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Checkin</strong></th>
                                    <th><strong>Checkout</strong></th>
                                    <th><strong>Total</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($data))
                                    @foreach ($data as $value)
                                        <tr>
                                            <td><strong>{{ $value['room']['nameRoom'] }}</strong></td>
                                            <td>
                                                <strong>{{ $value['nameUser'] }}</strong>
                                            </td>
                                            <td>{{ $value['phone'] }}</td>
                                            <td>{{ $value['emailUser'] }}</td>
                                            <td>{{ Carbon::parse($value['checkIn'])->toDateString() }}</td>
                                            <td>
                                                {{ Carbon::parse($value['checkOut'])->toDateString() }}
                                            </td>
                                            <td><strong>${{ $value['total'] }}</strong></td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                            data-toggle="modal" data-target=".bd-example-modal-lg">
                                                            <i class="fa fa-pencil"></i>
                                                        </button> --}}
                                                    <button
                                                        class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        id="deleteButton" data-id={{ $value['id'] }}>
                                                        <i class="fa fa-trash">

                                                        </i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        {{-- modal --}}
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Room Name</label>
                                                            <input type="text" name="firstName" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Use Name</label>
                                                            <input type="text" name="firstName" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Phone</label>
                                                            <input type="text" name="lastName" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="inputGroupPrepend2"
                                                                aria-describedby="inputGroupPrepend2" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Checkin</label>
                                                            <input type="date" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <div class="form-group">
                                                            <label>Checkout</label>
                                                            <input type="date" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Image</label>
                                                            <input type="text" class="form-control" required="">
                                                        </div>
                                                    </div> --}}
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("button#deleteButton").click(function() {
                let _this = $(this).closest('tr');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let id = $(this).attr('data-id');

                        $.ajax({
                            url: '/admin/booking/delete',
                            type: 'POST',
                            data: {
                                id: id,
                            },
                            success: function(data) {
                                _this.remove();
                            },
                            error: function(e) {
                                e.message();
                            }
                        })

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });
            });
        });
    </script>
@endsection
