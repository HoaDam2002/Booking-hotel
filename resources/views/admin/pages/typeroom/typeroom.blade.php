@extends('admin.layout.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">THÊM PHÒNG</h4>
        </div>
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
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-rounded btn-outline-info btn-lg">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Loại phòng</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>

                                <th><strong>Tên loại phòng</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>542</strong></td>

                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                            data-toggle="modal" data-target=".bd-example-modal-lg">
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
