@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ADD SERVICE</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissble">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="fa-solid fa-check"></i>Thông báo</h4>
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissble">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">Thông báo</i></h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" id="step-form-horizontal" class="step-form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Name service</label>
                                <input type="text" name="name" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-rounded btn-outline-info btn-lg" id="btn-submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>Name service</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td><strong></strong>{{ $value['name'] }}</td>
                                        <td>
                                            <div class="d-flex">
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
                            </tbody>
                        </table>
                        {{-- modal --}}
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

            $('button#deleteButton').click(function() {

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
                            url: '/admin/service/delete',
                            type: 'POST',
                            data: {
                                id: id,
                            },
                            success: function(data) {
                                //xóa thèn cha
                                _this.remove();
                            },
                            error: function(e) {
                                console.log(e.message);
                            }
                        })


                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        // Thêm mã xử lý xóa tại đây
                    }
                });

            });


            $('button#btn-submit').click(function() {
                $.ajax({
                    url: '/admin/service',
                    type: 'POST',
                    data: {
                        name: name,
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
            })
        });
    </script>
@endsection
