@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title">ADD TYPE ROOM</h4>
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>Thông báo</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
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
        </div> --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SALARY MANAGEMENT</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                        ADD
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Salary ID</strong></th>
                                    <th><strong>Salary</strong></strong></th>
                                    <th><strong></strong></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($luong))
                                    @foreach ($luong as $value)
                                        <tr>
                                            <td><strong id="ma">{{ $value['MaLuong'] }}</strong></td>
                                            <td><strong id="luong">{{ $value['SoLuong'] }}</strong></td>
                                            <td>
                                                <div class="d-flex">`
                                                    <button type="button"
                                                        class="btn shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        data-toggle="modal" data-target="#exampleModal" id="EditButton">
                                                        <i class="fa fa-pencil" id="EditButton">
                                                        </i>
                                                    </button>
                                                    <button style="margin-left: 5px"
                                                        class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        data-id={{ $value['MaLuong'] }} id="deleteButton">
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
                                        <h5 class="modal-title">SALARY MANAGEMENT</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Salary ID</label>
                                                            <input type="text" id="MaLuong" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Salary</label>
                                                            <input type="text" id="SoLuong" class="form-control"
                                                                required="">
                                                        </div>
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

                        <!-- Button trigger modal -->


                        <!-- Modal -->
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
                                        <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Salary ID</label>
                                                        <input type="text" id="MaLuongEdit" class="form-control"
                                                            required="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Salary</label>
                                                        <input type="text" id="SoLuongEdit" class="form-control"
                                                            required="">
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
                let maluong = $(this).closest('.modal-content').find('input#MaLuong').val();
                let soluong = $(this).closest('.modal-content').find('input#SoLuong').val();
                $.ajax({
                    url: '/admin/luong/them',
                    type: 'POST',
                    data: {
                        SoLuong: soluong,
                        MaLuong: maluong,
                    },
                    success: function(data) {
                        let luong = data.luong;
                        let html = "";
                        Object.keys(luong).map((key, index) => {
                            html +=
                                "<tr>" +
                                "<td><strong>" + luong[key].MaLuong + "</strong></td>" +
                                "<td><strong>" + luong[key].SoLuong + "</strong></td>" +
                                "<td>" +
                                "<div class='d-flex'>" +
                                "<button class='btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm' id='deleteButton' data-id=" +
                                luong[key].MaLuong + ">" +
                                "<i class='fa fa-trash'></i>" +
                                "</button>" +
                                "<button style='margin-left: 5px' type='button' class='btn shadow btn-xs sharp btn btn-warning btn sweet-confirm' data-toggle='modal' data-target='#exampleModal' id='EditButton'>" +
                                "<i class='fa fa-pencil'></i>" +
                                "</button>" +
                                "</div>" +
                                "</td>" +
                                "</tr>";
                        });

                        $('tbody').html(html);

                        Swal.fire(
                            'Success',
                            'Salary has been successfully',
                            'success'
                        )
                    },
                    error: function(e) {
                        console.log(e.message)
                    }
                })

            })

            $(document).on("click", "button#EditButton", function() {
                let parent = $(this).closest('tr')
                let maluong = parent.find('strong#ma').text()
                let soluong = parent.find('strong#luong').text()

                $('input#MaLuongEdit').val(maluong)
                $('input#SoLuongEdit').val(soluong)

                $("button#SaveEdit").click(function() {
                    let luongEdit = $(this).closest('.modal-content').find('input#SoLuongEdit')
                        .val()

                    $.ajax({
                        url: '/admin/luong/sua',
                        type: 'POST',
                        data: {
                            MaLuong: maluong,
                            SoLuong: luongEdit
                        },
                        success: function(data) {
                            let luong = data.luong;
                            let html = "";
                            Object.keys(luong).map((key, index) => {
                                html +=
                                    "<tr>" +
                                    "<td><strong>" + luong[key].MaLuong +
                                    "</strong></td>" +
                                    "<td><strong>" + luong[key].SoLuong +
                                    "</strong></td>" +
                                    "<td>" +
                                    "<div class='d-flex'>" +
                                    "<button class='btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm' id='deleteButton' data-id=" +
                                    luong[key].MaLuong + ">" +
                                    "<i class='fa fa-trash'></i>" +
                                    "</button>" +
                                    "<button style='margin-left: 5px' type='button' class='btn shadow btn-xs sharp btn btn-warning btn sweet-confirm' data-toggle='modal' data-target='#exampleModal' id='EditButton'>" +
                                    "<i class='fa fa-pencil'></i>" +
                                    "</button>" +
                                    "</div>" +
                                    "</td>" +
                                    "</tr>";
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
                        let maluong = $(this).attr('data-id');

                        $.ajax({
                            url: '/admin/luong/xoa',
                            type: 'POST',
                            data: {
                                MaLuong: maluong
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



        })
    </script>
@endsection
