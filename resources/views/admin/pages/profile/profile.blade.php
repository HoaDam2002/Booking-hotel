@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo">
                                <img src={{"/upload/admin/user/".$data[0]["avatar"]}} class="img-fluid"
                                alt="">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src={{"/upload/admin/user/".$data[0]["avatar"]}} class="img-fluid rounded-circle"
                                alt="">

                                {{-- @if (empty($dataUser->avatar))
                                    <img src="{{ asset('assets_admin/images/profile/profile.png') }}" class="img-fluid rounded-circle"
                                        alt="">
                                @endif --}}
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-5 pt-2">
                                    <h4 class="text-primary mb-0">{{$data[0]["name"]}}</h4>
                                    <p>Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{$data[0]["email"]}}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="profile-blog mb-3">
                            <h6>Name</h6>
                            <p class="mb-0">{{$data[0]["name"]}}</p>
                        </div>
                        <div class="profile-blog mb-3">
                            <h6>Email</h6>
                            <p class="mb-0">{{$data[0]["email"]}}</p>
                        </div>
                        <div class="profile-blog mb-3">
                            <h6>Gender</h6>
                            <p class="mb-0">{{$data[0]["gender"]}}</p>
                        </div>
                        <div class="profile-blog mb-3">
                            <h6>Phone</h6>
                            <p class="mb-0">{{$data[0]["phone"]}}</p>
                        </div>
                        <div class="profile-blog mb-3">
                            <h6>Address</h6>
                            <p class="mb-0">{{$data[0]["street"]}}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="" data-toggle="tab"
                                            class="nav-link active show">Account Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
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
                                                <form  method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" placeholder="Mitchell C. Shay" name="name"
                                                            class="form-control" value="{{$data[0]["name"]}}"> 
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" placeholder="hello@email.com" name="email"
                                                                class="form-control" value="{{$data[0]["email"]}}"  disabled>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="Password" name="password"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" placeholder="1234 Main St" name="street"
                                                            class="form-control" value="{{$data[0]["street"]}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" placeholder="+84 0123456789" name="phone"
                                                            class="form-control" value="{{$data[0]["phone"]}}">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label>Avatar</label>
                                                            <input type="file" class="form-control" name="avatar">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Gender</label>
                                                            <select class="form-control" id="inputState" name="gender">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn btn-rounded btn-outline-info" type="submit">Update</button>
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
    </div>
@endsection
