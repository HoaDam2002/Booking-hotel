@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Đánh giá phòng</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>Tên khách hàng</strong></th>
                                    <th><strong>Bình luận</strong></th>
                                    <th><strong>Số Phòng</strong></th>
                                    <th><strong>Rate</strong></th>
                                    <th><strong>Loại Phòng</strong></th>
                                    <th><strong>Tùy chọn</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>542</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center"><img src="/assets_admin/images/avatar/2.jpg"
                                                class="rounded-lg mr-2" width="24" alt=""> <span
                                                class="w-space-no">Dr. Jackson</span></div>
                                    </td>
                                    <td>example@example.com </td>
                                    <td>.com </td>
                                    <td>01 August 2020</td>

                                    <td>
                                        <div class="d-flex">
                                            <button
                                                class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                id="deleteButton">
                                                <i class="fa fa-trash">

                                                </i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
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
                                                            <label class="text-label">Tên khách hàng</label>
                                                            <input type="text" name="firstName" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Số điện thoại</label>
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
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Chekin</label>
                                                            <input type="date"  class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <div class="form-group">
                                                            <label>Chekout</label>
                                                            <input type="date"  class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hình ảnh</label>
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
    document.getElementById("deleteButton").addEventListener("click", function () {
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
