@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">THÊM BLOG</h4>
            </div>
            <div class="card-body">
                <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Tên blog</label>
                                <input type="text" name="firstName" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Slug blog</label>
                                <input type="text" name="lastName" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Hình ảnh</label>
                                <input type="email" class="form-control" id="inputGroupPrepend2"
                                    aria-describedby="inputGroupPrepend2" required="">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Nội dung</label>
                                <input type="text" name="phoneNumber" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label>Tình Trạng</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Tạm Tắt</option>
                                </select>
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
                    <h4 class="card-title">Exam Toppers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>Name</strong></th>
                                    <th><strong>Picture</strong></th>
                                    <th><strong>Tittle</strong></th>
                                    <th><strong>Content</strong></th>
                                    <th><strong>Action</strong></th>
                                    <th><strong>Status</strong></th>
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
                                    <td>01 August 2020</td>
                                    <td>
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-danger mr-1"></i>
                                            Canceled</div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button
                                                class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"">
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
                                                            <label class="text-label">Tên blog</label>
                                                            <input type="text" name="firstName" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Slug blog</label>
                                                            <input type="text" name="lastName" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hình ảnh</label>
                                                            <input type="email" class="form-control"
                                                                id="inputGroupPrepend2"
                                                                aria-describedby="inputGroupPrepend2" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Nội dung</label>
                                                            <input type="text" name="phoneNumber" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Tình Trạng</label>
                                                            <select name="trang_thai" class="form-control">
                                                                <option value="1">Hiển Thị</option>
                                                                <option value="0">Tạm Tắt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button type="button"
                                                        class="btn btn-rounded btn-outline-info btn-lg ">Update</button>
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
