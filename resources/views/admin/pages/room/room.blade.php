@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title">ADD ROOM</h4>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissble">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="fa-solid fa-check"></i>Thông báo</h4>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissble">
                    <button type="button"F class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>Thông báo</h4>
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
                                <label class="text-label">Name room</label>
                                <input type="text" name="nameRoom" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Price room</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">People</label>
                                <input type="text" name="Capacity" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Content</label>

                                <textarea class="form-control" name="description"></textarea>

                            </div>
                        </div>


                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label>Type Room</label>
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
                                <label class="text-label">Image</label>
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-rounded btn-outline-info btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div> --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissble">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="fa-solid fa-check"></i>Thông báo</h4>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissble">
                <button type="button"F class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>Thông báo</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">STAFF MANAGEMENT</h4>
                    <button class="btn btn-primary btn sweet-confirm" data-toggle="modal"
                        data-target=".bd-example-modal-lg">
                        ADD
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Staff ID</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Age</strong></th>
                                    <th><strong>Work Hour</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Position</strong></th>
                                    <th><strong>Department</strong></th>
                                    <th><strong>Salary</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($nhanvien))
                                    {{-- {{ dd($nhanvien) }} --}}
                                    @foreach ($nhanvien as $item)
                                        <tr>
                                            <td><strong id="manv">{{ $item['MaNhanVien'] }}</strong></td>

                                            <td>

                                                <strong id="tennhanvien">{{ $item['TenNhanVien'] }} </strong>
                                            </td>
                                            <td>
                                                <strong id="tuoi">
                                                    {{ $item['Tuoi'] }}
                                                </strong>
                                            </td>
                                            <td>
                                                <strong id="giolam">
                                                    {{ $item['GioLam'] }}
                                                </strong>
                                            </td>

                                            <td>
                                                <strong id="email">
                                                    {{ $item['Email'] }}
                                                </strong>
                                            </td>

                                            <td>
                                                <strong id="chucvu">
                                                    {{ $item['chucvu']['TenChucVu'] }}
                                                </strong>
                                            </td>


                                            <td>
                                                <strong id="phongban">
                                                    {{ $item['phongban']['TenPhongBan'] }}
                                                </strong>
                                            </td>

                                            <td>
                                                <strong id="luong">
                                                    {{ $item['chucvu']['luong']['SoLuong'] }}
                                                </strong>
                                            </td>


                                            <td>
                                                <div class="d-flex actionButton" data-id={{ $item['MaNhanVien'] }}>
                                                    {{-- <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg"
                                                        id="editButton">
                                                        <i class="fa fa-pencil"></i>
                                                    </button> --}}
                                                    <button type="button"
                                                        class="btn shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        data-toggle="modal" data-target="#exampleModal" id="EditButton">
                                                        <i class="fa fa-pencil" id="EditButton">
                                                        </i>
                                                    </button>
                                                    <button style="margin-left: 5px"
                                                        class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        id="deleteButton" data-id={{ $item['MaNhanVien'] }}>
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
                                        <h5 class="modal-title">STAFF MANAGEMENT</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">

                                            <form id="step-form-horizontal" class="step-form-horizontal form-edit"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Staff ID</label>
                                                            <input type="text" name="nameRoom" class="form-control"
                                                                value="" id="manhanvien">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Name</label>
                                                            <input type="text" name="price" class="form-control"
                                                                id="hovaten">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Age</label>
                                                            <input type="text" name="Capacity" class="form-control"
                                                                id="tuoi">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Work Hour</label>
                                                            <input type="text" name="Capacity" class="form-control"
                                                                id="giolam">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Email</label>
                                                            <input type="text" name="Capacity" class="form-control"
                                                                id="email">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Position</label>
                                                            <select name="roomTypeId" class="form-control" id="chucvu">
                                                                <option value="">Choose Position</option>
                                                                @if (isset($chucvu))
                                                                    @foreach ($chucvu as $item)
                                                                        <option value="{{ $item['MaChucVu'] }}">
                                                                            {{ $item['TenChucVu'] }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Department</label>
                                                            <select name="roomTypeId" class="form-control"
                                                                id="phongban">
                                                                <option value="">Choose Department</option>

                                                                @if (isset($phongban))
                                                                    @foreach ($phongban as $item)
                                                                        <option value="{{ $item['MaPhongBan'] }}">
                                                                            {{ $item['TenPhongBan'] }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Image</label>

                                                            <input type="file" name="image[]"
                                                                class="form-control editImageRoom" id="inputGroupPrepend2"
                                                                aria-describedby="inputGroupPrepend2" multiple>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-dismiss="modal">Close</button>
                                        <button id="them" data-id="" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Salary</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="step-form-horizontal" class="step-form-horizontal form-edit"
                                            enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Staff ID</label>
                                                        <input type="text" name="nameRoom" class="form-control"
                                                            value="" id="manhanvienEdit" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Name</label>
                                                        <input type="text" name="price" class="form-control"
                                                            id="hovatenEdit">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Age</label>
                                                        <input type="text" name="Capacity" class="form-control"
                                                            id="tuoiEdit">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Work Hour</label>
                                                        <input type="text" name="Capacity" class="form-control"
                                                            id="giolamEdit">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Email</label>
                                                        <input type="text" name="Capacity" class="form-control"
                                                            id="emailEdit">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label>Position</label>
                                                        <select name="roomTypeId" class="form-control" id="chucvuEdit">
                                                            <option value="">Choose Position</option>
                                                            @if (isset($chucvu))
                                                                @foreach ($chucvu as $item)
                                                                    <option value="{{ $item['MaChucVu'] }}">
                                                                        {{ $item['TenChucVu'] }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <select name="roomTypeId" class="form-control" id="phongbanEdit">
                                                            <option value="">Choose Department</option>

                                                            @if (isset($phongban))
                                                                @foreach ($phongban as $item)
                                                                    <option value="{{ $item['MaPhongBan'] }}">
                                                                        {{ $item['TenPhongBan'] }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" id="SaveEdit" class="btn btn-primary">Save
                                            changes</button>
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

            // $("button#deleteButton").click(function() {

            //     var id = $(this).attr('data-id');

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $(this).closest('tr').remove()
            //             $.ajax({
            //                 url: "{{ url('admin/room/delete') }}",
            //                 method: "POST",
            //                 data: {
            //                     id: id
            //                 },
            //                 success: function(data) {
            //                     if (data) {
            //                         Swal.fire(
            //                             'Xóa thành công!',
            //                             'Phòng của bạn đã được xóa',
            //                             'success'
            //                         );


            //                     }
            //                 }
            //             })
            //         }
            //     });
            // });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click", "button#deleteButton", function() {
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
                        let manhanvien = $(this).attr('data-id');

                        $.ajax({
                            url: '/admin/nhanvien/xoa',
                            type: 'POST',
                            data: {
                                MaNhanVien: manhanvien
                            },
                            success: function(data) {
                                _this.remove()
                            },
                            error: function(e) {
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

            $(document).on("click", "button#EditButton", function() {
                let parent = $(this).closest('tr');
                let manhanvien = parent.find('strong#manv').text();
                let tennhanvien = parent.find('strong#tennhanvien').text();
                let tuoi = parent.find('strong#tuoi').text();
                let giolam = parent.find('strong#giolam').text();
                let email = parent.find('strong#email').text();
                let chucvu = parent.find('strong#chucvu').text();
                let phongban = parent.find('strong#phongban').text();

                // console.log(tuoi)
                $('input#manhanvienEdit').val(manhanvien);
                $('input#hovatenEdit').val(tennhanvien);
                $('input#tuoiEdit').val(tuoi.trim());
                $('input#giolamEdit').val(giolam.trim());
                $('input#emailEdit').val(email.trim());
                $('select#chucvuEdit').val(chucvu);
                $('select#phongbanEdit').val(phongban);


                $("button#SaveEdit").click(function() {
                    let tennhanvienEdit = $(this).closest('.modal-content').find(
                            'input#hovatenEdit')
                        .val()
                    let tuoiEdit = $(this).closest('.modal-content').find(
                            'input#tuoiEdit')
                        .val()

                    let giolamEdit = $(this).closest('.modal-content').find(
                            'input#giolamEdit')
                        .val()
                    let emailEdit = $(this).closest('.modal-content').find(
                            'input#emailEdit')
                        .val()
                    let chucvuEdit = $(this).closest('.modal-content').find(
                            '#chucvuEdit')
                        .val()
                    let phongbanEdit = $(this).closest('.modal-content').find(
                            '#phongbanEdit')
                        .val()

                    $.ajax({
                        url: '/admin/nhanvien/sua',
                        type: 'POST',
                        data: {
                            MaNhanVien: manhanvien,
                            TenNhanVien: tennhanvienEdit,
                            Tuoi: tuoiEdit,
                            Email: emailEdit,
                            GioLam: giolamEdit,
                            MaChucVu: chucvuEdit,
                            MaPhongBan: phongbanEdit,
                        },
                        success: function(data) {
                            let nhanvien = data.nhanvien;
                            console.log(nhanvien)
                            let html = "";
                            Object.keys(nhanvien).map((key, index) => {
                                html +=
                                    '<tr>' +
                                    '<td><strong id="nameRoom">' + nhanvien[key]
                                    .MaNhanVien + '</strong></td>' +
                                    '<td id="Capacity">' + nhanvien[key]
                                    .TenNhanVien + '</td>' +
                                    '<td id="description">' + nhanvien[key]
                                    .Tuoi + '</td>' +
                                    '<td id="price">' + nhanvien[key].Email +
                                    '</td>' +
                                    '<td>' + nhanvien[key].GioLam + '</td>' +
                                    '<td>' + nhanvien[key]['chucvu'].TenChucVu +
                                    '</td>' +
                                    '<td>' + nhanvien[key]['phongban']
                                    .TenPhongBan + '</td>' +
                                    '<td>' + nhanvien[key]['chucvu']['luong']
                                    .SoLuong + '</td>' +
                                    '<td>' +
                                    '<div class="d-flex actionButton" data-id="' +
                                    nhanvien[key].MaNhanVien + '">' +

                                    '<button class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm" id="deleteButton" data-id="' +
                                    nhanvien[key].MaNhanVien + '">' +
                                    '<i class="fa fa-trash"></i>' +
                                    '</button>' +
                                    '<button style="margin-left: 5px" type="button" class="btn shadow btn-xs sharp btn btn-warning btn sweet-confirm" data-toggle="modal" data-target="#exampleModal" id="EditButton">' +
                                    '<i class="fa fa-pencil"></i>' +
                                    '</button>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>';

                            });

                            $('tbody').html(html);

                            Swal.fire(
                                'Just Update!!',
                                'Your Salary has been update.',
                                'success'
                            )
                        },
                        error: function(e) {
                            console.log(e.message)
                        }
                    })


                })
            })

            $('button#them').click(function(e) {
                e.preventDefault();
                let manhanvien = $(this).closest('.modal-content').find('input#manhanvien').val();
                let hovaten = $(this).closest('.modal-content').find('input#hovaten').val();
                let tuoi = $(this).closest('.modal-content').find('input#tuoi').val();
                let giolam = $(this).closest('.modal-content').find('input#giolam').val();
                let email = $(this).closest('.modal-content').find('input#email').val();
                let chucvu = $(this).closest('.modal-content').find('select#chucvu').val();
                let phongban = $(this).closest('.modal-content').find('select#phongban').val();

                $.ajax({
                    url: '/admin/nhanvien/them',
                    type: 'POST',
                    data: {
                        MaNhanVien: manhanvien,
                        TenNhanVien: hovaten,
                        Tuoi: tuoi,
                        Email: email,
                        GioLam: giolam,
                        MaChucVu: chucvu,
                        MaPhongBan: phongban,
                    },
                    success: function(data) {
                        let nhanvien = data.nhanvien;
                        let html = "";
                        Object.keys(nhanvien).map((key, index) => {
                            html +=
                                '<tr>' +
                                '<td><strong id="nameRoom">' + nhanvien[key]
                                .MaNhanVien + '</strong></td>' +
                                '<td id="Capacity">' + nhanvien[key].TenNhanVien +
                                ' </td>' +
                                '<td id="description">' + nhanvien[key].Tuoi + '</td>' +
                                '<td id="price">' + nhanvien[key].Email + '</td>' +
                                '<td>' + nhanvien[key].GioLam + '</td>' +
                                '<td>' + nhanvien[key]['chucvu'].TenChucVu + '</td>' +
                                '<td>' + nhanvien[key]['phongban'].TenPhongBan +
                                '</td>' +
                                '<td>' + nhanvien[key]['chucvu']['luong'].SoLuong +
                                '</td>' +
                                '<td>' +
                                '<div class="d-flex actionButton" data-id="' + nhanvien[
                                    key].MaNhanVien + '">' +
                                '<button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="modal" data-target=".bd-example-modal-lg" id="editButton">' +
                                '<i class="fa fa-pencil"></i>' +
                                '</button>' +
                                '<button class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm" id="deleteButton" data-id="' +
                                nhanvien[key].MaNhanVien + '">' +
                                '<i class="fa fa-trash"></i>' +
                                '</button>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        });

                        $('tbody').html(html);

                        Swal.fire(
                            'Thành Công',
                            'Mức Lương đã được thêm!',
                            'success'
                        )
                    },
                    error: function(e) {
                        console.log(e.message)
                    }
                })

            })

            // $('button#editButton').click(function() {
            //     let id = $(this).parent('div.actionButton').attr('data-id');
            //     console.log(id);
            //     $.ajax({
            //         url: '/admin/room/edit/',
            //         type: 'POST',
            //         data: {
            //             id: id
            //         },
            //         success: function(data) {
            //             console.log(data);

            //             $('input#nameRoom').val(data[0].nameRoom);
            //             $('input#price').val(data[0].price);
            //             $('input#Capacity').val(data[0].Capacity);
            //             $('textarea.description').val(data[0].description);
            //             $('select#roomTypeId').val(data[0].roomTypeId);
            //             $('input#nameRoom').attr('data-id', data[0].id);

            //         },
            //         error: function(e) {
            //             console.log(e.message);
            //         }
            //     })



            //     let __this = $(this).closest('tr')

            //     $("button#updateButton").click(function() {
            //         var nameRoom = $(this).closest('.modal-content').find('input#nameRoom').val()
            //         var price = $(this).closest('.modal-content').find('input#price').val()
            //         var Capacity = $(this).closest('.modal-content').find('input#Capacity').val()
            //         var description = $(this).closest('.modal-content').find('textarea.description')
            //             .val()
            //         var roomTypeId = $(this).closest('.modal-content').find('select#roomTypeId')
            //             .val()
            //         var files = $(this).closest('.modal-content').find('input.editImageRoom')[0]
            //             .files;

            //         var id = $(this).closest('.modal-content').find('input#nameRoom').attr(
            //             'data-id');
            //         let form = new FormData();

            //         for (var i = 0; i < files.length; i++) {
            //             form.append('image[]', files[i]);
            //         }

            //         form.append('nameRoom', nameRoom);
            //         form.append('price', price);
            //         form.append('Capacity', Capacity);
            //         form.append('description', description);
            //         form.append('roomTypeId', roomTypeId);
            //         form.append('id', id);

            //         Swal.fire({
            //             title: 'Are you sure?',
            //             text: "You won't be able to revert this!",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#3085d6',
            //             cancelButtonColor: '#d33',
            //             confirmButtonText: 'Yes, Got it!'
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 $.ajax({
            //                     url: "{{ url('admin/room/edit/update') }}",
            //                     type: 'POST',
            //                     processData: false,
            //                     mimeType: "multipart/form-data",
            //                     contentType: false,
            //                     dataType: 'json',
            //                     data: form,
            //                     success: function(response) {
            //                         if (response) {
            //                             let items = JSON.parse(response.data);
            //                             let type = response.room
            //                             console.log(items)
            //                             __this.find('strong#nameRoom')
            //                                 .text(items['nameRoom']);
            //                             __this.find('td#Capacity').text(items[
            //                                 'Capacity']);


            //                             __this.find('td#roomTypeId').text(type)
            //                             __this.find('td#description').text(
            //                                 items[
            //                                     'description'])

            //                             console.log(items)

            //                             // __this.find('td#roomTypeId').val(items[
            //                             //     'roomTypeId']);
            //                             // _this.find('td#roomTypeId option:selected').text()

            //                             __this.find('td#price').text(items[
            //                                 'price']);

            //                             let image = items['image'];

            //                             let url =
            //                                 "{{ asset('upload/admin/room') }}/" +
            //                                 image;

            //                             // console.log(url)

            //                             __this.find('img#renderimg').attr('src',
            //                                 url)

            //                             Swal.fire(
            //                                 'Thành công',
            //                                 'Phòng của bạn đã được cập nhật.',
            //                                 'success'
            //                             );
            //                         } else {
            //                             // console.log(res)

            //                             Swal.fire(
            //                                 'Lỗi',
            //                                 'Phòng của bạn chưa cập nhật.',
            //                                 'error'
            //                             );
            //                         }
            //                     }
            //                 })

            //             }
            //         });



            //         // if (flag) {
            //         //
            //         // }
            //     });

            // })



        })
    </script>
@endsection
