@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">THÊM BLOG</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissble">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">Thông báo</i></h4>
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
                <form method="POST" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Tên blog</label>
                                <input type="text" name="title" class="form-control" >
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 mb-2">
                            <div class="form-group">
                                <label class="text-label">Slug blog</label>
                                <input type="text" name="lastName" class="form-control" required="">
                            </div>
                        </div> --}}
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Hình ảnh</label>
                                <input type="file" name="image" class="form-control" id="inputGroupPrepend2"
                                    aria-describedby="inputGroupPrepend2">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label">Nội dung</label>
                                <textarea class="form-control" id="editor" name="description"></textarea>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label>Tình Trạng</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Tạm Tắt</option>
                                </select>
                            </div>
                        </div> --}}
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
                    <h4 class="card-title">Blogs Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>ID</strong></th>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Content</strong></th>
                                    <th><strong>Status</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    foreach ($data as $key => $value) {
                                @endphp
                                <tr>
                                    <td ><strong class="idBlogs">{{$value['id']}}</strong></td>
                                    <td class="titleBlogs">{!!Str::limit($value['title'], 25, '...')!!}</td>
                                    <td>
                                        <div class="d-flex align-items-center"><img src={{"/upload/admin/blogs/".$value['image']}}
                                                class="rounded-lg mr-2 imgBlogs" width="24" alt=""></div>
                                    </td>

                                    <td class="descBlogs">{!!Str::limit($value['description'], 40, '...')!!}</td>
                                    <td>
                                        <div class="d-flex actionButton" data-id={{$value['id']}} >
                                            <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                data-toggle="modal" data-target=".bd-example-modal-lg" id="editButton">
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
                                @php
                                    }
                                @endphp
                            </tbody>
                            {{-- {{$data->links()}} --}}
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
                                            <form method="POST" id="step-form-horizontal" class="step-form-horizontal form-edit" enctype="multipart/form-datas" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Tên blog</label>
                                                            <input type="text" name="title" class="form-control editNameBlog"
                                                                7>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hình ảnh</label>
                                                            <input type="file" name="image" class="form-control editImageBlog"
                                                                id="inputGroupPrepend2"
                                                                aria-describedby="inputGroupPrepend2"
                                                                >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Nội dung</label>
                                                            <textarea class="form-control editDescriptionBlog" id="editor1" name="editor"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger light"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary saveUpdateButton" data-id=''>Save changes</button>
                                                </div>
                                            </form>
                                        </div>
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
        $("button#deleteButton").click(function() {
            //gọi thèn cha
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
                        let id = $('button#deleteButton').parent('div.actionButton').attr('data-id');

                        $.ajax({
                            url: '/admin/blogs/delete',
                            type: 'POST',
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                //xóa thèn cha
                                _this.remove();
                            },
                            error: function (e) {
                                console.log(e.message);
                            }
                        })
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        // Thêm mã xử lý xóa tại đây
                    }
                });
            });



        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('button#editButton').click(function () {
                let id = $(this).parent('div.actionButton').attr('data-id');
                //ajax add blogs
                $.ajax({
                    url: '/admin/blogs/edit',
                    type: 'POST',
                    data: {
                        id: id,

                    },
                    success: function (data) {
                        // console.log(data);
                        $('input.editNameBlog').val(data[0].title);
                        $('textarea.editDescriptionBlog').val(data[0].description);
                        $('button.saveUpdateButton').attr('data-id', data[0].id);
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                })
                //gọi tới thẻ button editbutton rồi gọi đến thẻ cha tr để render sau khi update
                let _this = $(this).closest('tr');

                ///////click save update
                $('button.saveUpdateButton').click(function () {
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let image = $('input.editImageBlog')[0].files[0] || '';
                            let id = $(this).attr('data-id');
                            let title = $('input.editNameBlog').val();
                            let description = $('textarea.editDescriptionBlog').val();

                                    let form = new FormData();
                            form.append('image', image);
                            form.append('title', title);
                            form.append('id', id);
                            form.append('description', description);

                            $.ajax({
                                url: '/admin/blogs/update',
                                type: 'POST',
                                processData: false,
                                mimeType: "multipart/form-data",
                                contentType: false,
                                data: form,
                                success: function (data) {
                                    data = JSON.parse(data);

                                    //render khi update
                                    _this.find('.idBlogs').text(data.id);
                                    _this.find('.titleBlogs').text(data.title);
                                    _this.find('.descBlogs').text(data.description);
                                    _this.find('.imgBlogs').attr('src', `/upload/admin/blogs/${data.image}`);
                                },
                                error: function (e) {
                                    console.log(e.message);
                                }
                            })

                            Swal.fire(
                                'Update!',
                                'Your file has been Update.',
                                'success'
                            );
                        }
                    })
                    

                    
                })
            })
        })
    </script>
@endsection
