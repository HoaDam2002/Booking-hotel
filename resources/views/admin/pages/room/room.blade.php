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
                    <h4><i class="fa-solid fa-check"></i>Thông báo</h4>
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

                                <textarea class="form-control" name="description"></textarea>

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
                                    <th><strong>Nội dung</strong></th>
                                    <th><strong>Giá</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($rooms))
                                    @foreach ($rooms as $item)
                                        <tr>
                                            <td><strong id="nameRoom">{{ $item['nameRoom'] }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center"><img
                                                        src=" {{ asset('upload/admin/room/' . $item['image']) }}"
                                                        class="rounded-lg mr-2" width="24" alt=""
                                                        id="renderimg"> <span class="w-space-no"></span></div>
                                            </td>
                                            <td id="Capacity">{{ $item['Capacity'] }} </td>
                                            @if ($item['type_room'])
                                                <td id="roomTypeId">{{ $item['type_room']['typeName'] }}</td>
                                            @endif
                                            <td id="description">
                                                {{ $item['description'] }}
                                            </td>

                                            <td id="price">
                                                {{-- <div class="d-flex align-items-center"><i class="fa fa-circle text-danger mr-1"></i>
                                            Canceled</div> --}}
                                                {{ $item['price'] }}
                                            </td>


                                            <td>
                                                <div class="d-flex actionButton" data-id={{ $item['id'] }}>
                                                    <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg"
                                                        id="editButton">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-danger shadow btn-xs sharp btn btn-warning btn sweet-confirm"
                                                        id="deleteButton" data-id={{ $item['id'] }}>
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

                                            <form action="#" id="step-form-horizontal"
                                                class="step-form-horizontal form-edit" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Tên phòng</label>
                                                            <input type="text" name="nameRoom" class="form-control"
                                                                value="" id="nameRoom">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Giá phòng</label>
                                                            <input type="text" name="price" class="form-control"
                                                                id="price">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Số người</label>
                                                            <input type="text" name="Capacity" class="form-control"
                                                                id="Capacity">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Nội dung</label>

                                                            <textarea class="form-control description" id="" name="description"></textarea>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <label>Loại phòng</label>
                                                            <select name="roomTypeId" class="form-control"
                                                                id="roomTypeId">

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

                                                            <input type="file" name="image"
                                                                class="form-control editImageRoom" id="inputGroupPrepend2"
                                                                aria-describedby="inputGroupPrepend2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" id="updateButton" data-id=""
                                            class="btn btn-primary">Save
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

            $("button#deleteButton").click(function() {

                var id = $(this).attr('data-id');

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
                        $(this).closest('tr').remove()
                        $.ajax({
                            url: "{{ url('admin/room/delete') }}",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data) {

                                    Swal.fire(
                                        'Xóa thành công!',
                                        'Phòng của bạn đã được xóa',
                                        'success'
                                    );


                                }
                            }
                        })
                    }
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('button#editButton').click(function() {
                let id = $(this).parent('div.actionButton').attr('data-id');
                console.log(id);
                $.ajax({
                    url: '/admin/room/edit/',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);

                        $('input#nameRoom').val(data[0].nameRoom);
                        $('input#price').val(data[0].price);
                        $('input#Capacity').val(data[0].Capacity);
                        $('textarea.description').val(data[0].description);
                        $('select#roomTypeId').val(data[0].roomTypeId);
                        $('input#nameRoom').attr('data-id', data[0].id);

                    },
                    error: function(e) {
                        console.log(e.message);
                    }
                })



                let __this = $(this).closest('tr')

                $("button#updateButton").click(function() {
                    var nameRoom = $(this).closest('.modal-content').find('input#nameRoom').val()
                    var price = $(this).closest('.modal-content').find('input#price').val()
                    var Capacity = $(this).closest('.modal-content').find('input#Capacity').val()
                    var description = $(this).closest('.modal-content').find('textarea.description')
                        .val()
                    var roomTypeId = $(this).closest('.modal-content').find('select#roomTypeId')
                        .val()
                    var image = $(this).closest('.modal-content').find('input.editImageRoom')[0]
                        .files[0] || '';
                    var id = $(this).closest('.modal-content').find('input#nameRoom').attr(
                        'data-id');
                    let form = new FormData();
                    form.append('nameRoom', nameRoom);
                    form.append('price', price);
                    form.append('Capacity', Capacity);
                    form.append('description', description);
                    form.append('roomTypeId', roomTypeId);
                    form.append('image', image);
                    form.append('id', id);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Got it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ url('admin/room/edit/update') }}",
                                type: 'POST',
                                processData: false,
                                mimeType: "multipart/form-data",
                                contentType: false,
                                dataType: 'json',
                                data: form,
                                success: function(response) {
                                    if (response) {
                                        let items = JSON.parse(response.data);
                                        let type = response.room
                                        console.log(items)
                                        __this.find('strong#nameRoom')
                                            .text(items['nameRoom']);
                                        __this.find('td#Capacity').text(items[
                                            'Capacity']);


                                        __this.find('td#roomTypeId').text(type)
                                        __this.find('td#description').text(
                                            items[
                                                'description'])

                                        console.log(items)

                                        // __this.find('td#roomTypeId').val(items[
                                        //     'roomTypeId']);
                                        // _this.find('td#roomTypeId option:selected').text()

                                        __this.find('td#price').text(items[
                                            'price']);

                                        let image = items['image'];

                                        let url =
                                            "{{ asset('upload/admin/room') }}/" +
                                            image;

                                        // console.log(url)

                                        __this.find('img#renderimg').attr('src',
                                            url)

                                        Swal.fire(
                                            'Thành công',
                                            'Phòng của bạn đã được cập nhật.',
                                            'success'
                                        );
                                    } else {
                                        // console.log(res)

                                        Swal.fire(
                                            'Lỗi',
                                            'Phòng của bạn chưa cập nhật.',
                                            'error'
                                        );
                                    }
                                }
                            })

                        }
                    });



                    // if (flag) {
                    //
                    // }
                });

            })



        })
    </script>
@endsection
