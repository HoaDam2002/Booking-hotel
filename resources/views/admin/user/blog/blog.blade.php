@extends('admin.layout.app')

@section('content')
<div class="row">
    <div class="col-12">
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
                <h4 class="card-title">Default Table</h4>
                <h6 class="card-subtitle">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</h6>
                <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With Outside Padding</h6>
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Content</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($item))
                                @foreach ($item as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->image}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->content}}</td>
                                        <td>
                                            <div><a href="{{url('admin/editblog/'.$value->id)}}"> <i class="mdi mdi-lead-pencil"></i> Edit</a></div>
                                            <div>
                                                <a href="{{url('admin/deleteblog/'.$value->id)}}"><i class="mdi mdi-delete">Delete</i></a>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                            @endif

                        </tbody>

                    </table>
                    <div class="pagination">
                        {{$item->links()}}
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <a href="{{url('admin/addblog')}}"><button class="btn btn-success">Add Blog</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
