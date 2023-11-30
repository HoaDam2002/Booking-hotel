@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">DEPARTMENT</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                        ADD
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Department ID</strong></th>
                                    <th><strong>Department Name</strong></th>
                                    <th><strong></strong></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($phongban))
                                    @foreach ($phongban as $value)
                                        <tr>
                                            <td><strong id="maphongban">{{ $value['MaPhongBan'] }}</strong></td>
                                            <td><strong id="tenphongban">{{ $value['TenPhongBan'] }}</strong></td>
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
                                                        id="deleteButton" data-id={{ $value['MaPhongBan'] }}>
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
                                        <h5 class="modal-title">DEPARTMENT MANAGEMENT</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Department ID</label>
                                                            <input type="text" id="MaPhongBan" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Department Name</label>
                                                            <input type="text" id="TenPhongBan" class="form-control"
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
                                                        <label class="text-label">Department ID</label>
                                                        <input type="text" id="idphongbanEdit" class="form-control"
                                                            required="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Department Name</label>
                                                        <input type="text" id="tenphongbanEdit" class="form-control"
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

            $(document).on("click", "button#deleteButton", function() {
                //gọi thèn cha
                let _this = $(this).closest('tr');
                Swal.fire({
                    title: 'Are you sure you want to delete',
                    text: 'It will be deleted',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let id = $(this).attr(
                            'data-id');

                        $.ajax({
                            url: '/admin/phongban/xoa',
                            type: 'POST',
                            data: {
                                MaPhongBan: id,
                            },
                            success: function(data) {
                                //xóa thèn cha
                                _this.remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                );
                            },
                            error: function(e) {
                                console.log(e.message);
                            }
                        })

                    }
                });
            });

            $('button#them').click(function() {
                let maphongban = $(this).closest('.modal-content').find('input#MaPhongBan').val();
                let tenphongban = $(this).closest('.modal-content').find('input#TenPhongBan').val();
                $.ajax({
                    url: '/admin/phongban/them',
                    type: 'POST',
                    data: {
                        MaPhongBan: maphongban,
                        TenPhongBan: tenphongban,
                    },
                    success: function(data) {
                        let phongban = data.phongban;
                        let html = "";
                        Object.keys(phongban).map((key, index) => {
                            html +=
                                '<tr>' +
                                '   <td><strong>' + phongban[key].MaPhongBan +
                                '</strong></td>' +
                                '   <td><strong>' + phongban[key].TenPhongBan +
                                '</strong></td>' +
                                '   <td>' +
                                '       <div class="d-flex">' +
                                '           <button ' +
                                '               class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm" ' +
                                '               id="deleteButton" data-id="' + phongban[
                                    key].MaPhongBan + '"> ' +
                                '               <i class="fa fa-trash"> ' +
                                '               </i>' +
                                '           </button>' +
                                '       </div>' +
                                '   </td>' +
                                '</tr>';
                        });

                        $('tbody').html(html);

                        Swal.fire(
                            'SUCCESS',
                            'Department has successfully',
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
                let maphongban = parent.find('strong#maphongban').text()
                let tenphongban = parent.find('strong#tenphongban').text()

                $('input#idphongbanEdit').val(maphongban)
                $('input#tenphongbanEdit').val(tenphongban)

                $("button#SaveEdit").click(function() {
                    let tenphongbanEdit = $(this).closest('.modal-content').find(
                        'input#tenphongbanEdit').val()

                    $.ajax({
                        url: '/admin/phongban/sua',
                        type: 'POST',
                        data: {
                            MaPhongBan: maphongban,
                            TenPhongBan: tenphongbanEdit
                        },
                        success: function(data) {
                            let phongban = data.phongban;
                            let html = "";
                            Object.keys(phongban).map((key, index) => {
                                html +=
                                    '<tr>' +
                                    '<td><strong id="maphongban">' +
                                    phongban[key].MaPhongBan +
                                    '</strong></td>' +
                                    '<td><strong id="tenphongban">' +
                                    phongban[key].TenPhongBan  +
                                    '</strong></td>' +
                                    '<td>' +
                                    '<div class="d-flex">' +
                                    '<button type="button" class="btn shadow btn-xs sharp btn btn-warning btn sweet-confirm" data-toggle="modal" data-target="#exampleModal" id="EditButton">' +
                                    '<i class="fa fa-pencil" id="EditButton"></i>' +
                                    '</button>' +
                                    '<button style="margin-left: 5px" class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm" id="deleteButton" data-id=' +
                                    phongban[key].MaPhongBan + '>' +
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

        })
    </script>
@endsection
