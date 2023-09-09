@extends('admin.layout.app')

@section('content')
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissble">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">Thông báo</i></h4>
                        {{session('success')}}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissble">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">Thông báo</i></h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal form-material" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Title</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" name="title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Image</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control form-control-line" name="image" id="example-email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Description</label>
                        <div class="col-md-12">
                            <textarea name="description" class="form-control form-control-line" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Content</label>
                        <div class="col-md-12">
                            <textarea name="content" id="demo" cols="30" rows="10" class="form-control form-control-line" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input class="btn btn-success" type="submit" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
