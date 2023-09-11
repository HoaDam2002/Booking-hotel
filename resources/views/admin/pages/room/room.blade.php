@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">THÊM PHÒNG</h4>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissble">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check">Thông báo</i></h4>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissble">
                    <button type="button"F class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check">Thông báo</i></h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="#" method="post" id="step-form-horizontal" class="step-form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Tên phòng</label>
                                <input type="text" name="nameRoom" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Giá phòng</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Số người</label>
                                <input type="text" name="Capacity" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Nội dung</label>
                                <textarea class="form-control" id="editor" name="description"></textarea>
                            </div>
                        </div>


                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select class="form-control" name="roomTypeId">
                                    <option value=""></option>
                                    @if (isset($typeroom))
                                        @foreach ($typeroom as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['typeName'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Hình ảnh</label>
                                <input type="file" name="image" class="form-control">
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
                    <h4 class="card-title">Exam Toppers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>Tên phòng</strong></th>
                                    <th><strong>Hình ảnh</strong></th>
                                    <th><strong>Số người</strong></th>
                                    <th><strong>Loại phòng</strong></th>
                                    <th><strong>Giá</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($rooms))
                                    @foreach ($rooms as $item)
                                        <tr>
                                            <td><strong>{{ $item['nameRoom'] }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center"><img
                                                        src=" {{ asset('upload/admin/room/' . $item['image']) }}"
                                                        class="rounded-lg mr-2" width="24" alt=""> <span
                                                        class="w-space-no"></span></div>
                                            </td>
                                            <td>{{ $item['Capacity'] }} </td>
                                            <td>{{ $item['roomTypeId'] }}</td>
                                            <td>
                                                {{-- <div class="d-flex align-items-center"><i class="fa fa-circle text-danger mr-1"></i>
                                            Canceled</div> --}}
                                                {{ $item['price'] }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg" id="{{ $item['id'] }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        id="deleteButton">
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

                                            <form action="#" id="step-form-horizontal" class="step-form-horizontal"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Tên phòng</label>
                                                            <input type="text" name="nameRoom" class="form-control"
                                                                value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Giá phòng</label>
                                                            <input type="text" name="price" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Số người</label>
                                                            <input type="text" name="Capacity" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Nội dung</label>
                                                            <input type="text" name="description"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Loại phòng</label>
                                                            <select name="roomTypeId" class="form-control">
                                                                <option value=""></option>
                                                                @if (isset($typeroom))
                                                                    @foreach ($typeroom as $item)
                                                                        <option value="{{ $item['id'] }}">
                                                                            {{ $item['typeName'] }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hình ảnh</label>
                                                            <input type="file" name="image" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
        document.getElementById("deleteButton").addEventListener("click", function() {
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
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    // Thêm mã xử lý xóa tại đây
                }
            });
        });






    </script>
@endsection
