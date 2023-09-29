@extends('admin.layout.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">ADD TYPE ROOM</h4>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissble">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="fa-solid fa-check"></i>Thông báo</h4>
            {{session('success')}}
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissble">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check">Thông báo</i></h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="" method="POST" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <div class="form-group">
                            <label class="text-label">Name</label>
                            <input type="text" name="typeName" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-rounded btn-outline-info btn-lg">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Type room</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
<<<<<<< HEAD
                                {{-- <th><strong>ID</strong></th> --}}
                                <th><strong>Tên loại phòng</strong></th>
=======
                                <th><strong>ID</strong></th>
                                <th><strong>Name</strong></th>
>>>>>>> b3ed6f8e747d9da4746b15828d55902a1c4c1f84
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    {{-- <td><strong>{{$value['id']}}</strong></td> --}}
                                    <td><strong>{{$value['typeName']}}</strong></td>
                                    <td>
                                        <div class="d-flex">
                                            <button
                                                class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                id="deleteButton" data-id={{$value['id']}}>
                                                <i class="fa fa-trash">

                                                </i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- modal --}}
                    {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;"
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
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Tên loại phòng</label>
                                                        <input type="text" name="phoneNumber" class="form-control" required="">
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
                    </div> --}}
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
                        url: '/admin/typeroom/delete',
                        type: 'POST',
                        data: {id: id},
                        success: function(data) {
                            _this.remove()
                        },
                        error: function (e) {
                            console.log(e.message)
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
