@extends('admin.layout.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
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
                <h4 class="card-title">Default Forms</h4>
                <h5 class="card-subtitle"> All bootstrap element classies </h5>
                <form class="form-horizontal m-t-30" method="POST" style="width: 500px">
                    @csrf
                    <div class="form-group">
                        <label>Name Brand</label>
                        <input type="text" class="form-control" name="name_brand">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="btn btn-success" type="submit" value="ADD">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
