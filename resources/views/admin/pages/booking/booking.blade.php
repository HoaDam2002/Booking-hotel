@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">POSITION MANAGEMENT</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                        ADD
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Position ID</strong></th>
                                    <th><strong>Position Name</strong></th>
                                    <th><strong>Salary</strong></th>
                                    <th><strong></strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($chucvu))
                                    @foreach ($chucvu as $value)
                                        <tr>
                                            <td><strong id="machucvu">{{ $value['MaChucVu'] }}</strong></td>
                                            <td>
                                                <strong id="tenchucvu">{{ $value['TenChucVu'] }}</strong>
                                            </td>
                                            <td>{{ $value['luong']['SoLuong'] }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button"
                                                        class="btn shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        data-toggle="modal" data-target="#exampleModal" id="EditButton">
                                                        <i class="fa fa-pencil" id="EditButton">
                                                        </i>
                                                    </button>
                                                    <button style="margin-left: 5px"
                                                        class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        id="deleteButton" data-id={{ $value['MaChucVu'] }}>
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
                                        <h5 class="modal-title">POSITION MANAGEMENT</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label" for="MaLuong">Position ID</label>
                                                        <input type="text" id="MaChucVu" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label" for="SoLuong">Position Name</label>
                                                        <input type="text" id="TenChucVu" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        {{-- <label class="text-label" for="genderSelect">Giới tính</label> --}}
                                                        <select class="form-control" id="MaLuong">
                                                            <option value="">Choose Salary</option>
                                                            @if (isset($luong))
                                                                @foreach ($luong as $value)
                                                                    <option value="{{ $value['MaLuong'] }}">
                                                                        {{ $value['SoLuong'] }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" id="them" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Position ID</label>
                                                        <input type="text" id="idchucvuEdit" class="form-control"
                                                            required="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Position Name</label>
                                                        <input type="text" id="tenchucvuEdit" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        {{-- <label class="text-label" for="genderSelect">Giới tính</label> --}}
                                                        <select class="form-control" id="maluongEdit">
                                                            <option value="">Choose Salary</option>
                                                            @if (isset($luong))
                                                                @foreach ($luong as $value)
                                                                    <option value="{{ $value['MaLuong'] }}">
                                                                        {{ $value['SoLuong'] }}</option>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('button#them').click(function() {
                let maluong = $(this).closest('.modal-content').find('select#MaLuong').val();
                let machucvu = $(this).closest('.modal-content').find('input#MaChucVu').val();
                let tenchucvu = $(this).closest('.modal-content').find('input#TenChucVu').val();

                console.log(maluong, machucvu, tenchucvu);

                $.ajax({
                    url: '/admin/chucvu/them',
                    type: 'POST',
                    data: {
                        MaLuong: maluong,
                        MaChucVu: machucvu,
                        TenChucVu: tenchucvu
                    },
                    success: function(data) {
                        let chucvu = data.chucvu;
                        let html = "";
                        Object.keys(chucvu).map((key, index) => {
                            html +=
                                '<tr>' +
                                '<td><strong>' + chucvu[key].MaChucVu +
                                '</strong></td>' +
                                '<td>' +
                                '<strong>' + chucvu[key].TenChucVu + '</strong>' +
                                '</td>' +
                                '<td>' + chucvu[key]['luong'].SoLuong + '</td>' +
                                '<td>' +
                                '<div class="d-flex">' +
                                '<button class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm" ' +
                                'id="deleteButton" data-id="' + chucvu[key].MaChucVu +
                                '">' +
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
                        let machucvu = $(this).attr('data-id');

                        $.ajax({
                            url: '/admin/chucvu/xoa',
                            type: 'POST',
                            data: {
                                MaChucVu: machucvu
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
                let parent = $(this).closest('tr')
                let machucvu = parent.find('strong#machucvu').text()
                let tenchucvu = parent.find('strong#tenchucvu').text()

                $('input#idchucvuEdit').val(machucvu)
                $('input#tenchucvuEdit').val(tenchucvu)

                $("button#SaveEdit").click(function() {
                    let tenchucvuEdit = $(this).closest('.modal-content').find('input#tenchucvuEdit')
                        .val()

                    let maluong = $(this).closest('.modal-content').find('select#maluongEdit')
                        .val()

                    $.ajax({
                        url: '/admin/chucvu/sua',
                        type: 'POST',
                        data: {
                            MaChucVu: machucvu,
                            MaLuong: maluong,
                            TenChucvu: tenchucvuEdit
                        },
                        success: function(data) {
                            let chucvu = data.chucvu;
                            let html = "";
                            Object.keys(chucvu).map((key, index) => {
                                html +=
                                    '<tr>' +
                                    '<td><strong id="machucvu">' + chucvu[key]
                                    .MaChucVu + '</strong></td>' +
                                    '<td>' +
                                    '<strong id="tenchucvu">' + chucvu[key]
                                    .TenChucVu + '</strong>' +
                                    '</td>' +
                                    '<td>' + chucvu[key].luong.SoLuong +
                                    '</td>' +
                                    '<td>' +
                                    '<div class="d-flex">' +
                                    '<button type="button" class="btn shadow btn-xs sharp btn btn-warning btn sweet-confirm" data-toggle="modal" data-target="#exampleModal" id="EditButton">' +
                                    '<i class="fa fa-pencil" id="EditButton"></i>' +
                                    '</button>' +
                                    '<button style="margin-left: 5px" class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm" id="deleteButton" data-id=' +
                                    chucvu[key].MaChucVu + '>' +
                                    '<i class="fa fa-trash"></i>' +
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
        });
    </script>
@endsection
