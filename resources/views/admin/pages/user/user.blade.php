@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">USER</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>UserName</strong></th>
                                    <th><strong>Phone</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Avatar</th>
                                    <th><strong>Address</th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($data))
                                    @foreach ($data as $value)
                                        <tr>
                                            <td><strong>{{ $value['name'] }}</strong></td>
                                            <td>{{ $value['phone'] }}</td>
                                            <td>{{ $value['email'] }}</td>
                                            <td>
                                                <div class="d-flex align-items-center"><img
                                                        src="/upload/user/avatar/{{ $value['avatar'] }}"
                                                        class="rounded-lg mr-2" width="24" alt=""></div>
                                            </td>

                                            <td>{{ $value['street'] }}</td>

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
                                                            <label class="text-label">Name user</label>
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
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Image</label>
                                                            <input type="text" class="form-control" required="">
                                                        </div>
                                                    </div>
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
                            url: '/admin/user/delete',
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
        })
    </script>
@endsection
