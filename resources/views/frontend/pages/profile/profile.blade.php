@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="booking-form" style="width: 50%; margin-left: 310px">
            @if (session('success'))
                <div class="alert alert-success alert-dismissble">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
                    <h4><i class="icon fa fa-check">Thông báo</i></h4>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissble">
                    {{-- <button type="button"F class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
                    <h4><i class="icon fa fa-check">Thông báo</i></h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Your Profile</h3>
            <form method="POST" action="profile/update" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="qWs4UmMM2EXgvfwmQ0YLQmaYEVJovRVnXXSB4Hff">

                <div class="check-date">
                    <label for="">Name:</label>
                    <input type="text" name="name" value={{ $user->name }} class="">
                </div>
                <div class="check-date">
                    <label for="">Email:</label>
                    <input name="email" type="email" value={{ $user->email }} class="">
                </div>
                <div class="check-date">
                    <label for="">Phone:</label>
                    <input name="phone" type="text" value={{ $user->phone }} class="">
                </div>
                <div class="check-date">
                    <label for="">Street:</label>
                    <input name="street" type="text" value={{ $user->street }} class="">
                </div>

                <div class="check-date">
                    <label for="">Avatar:</label>
                    <input name="avatar" type="file" class="">
                </div>

                <div class="select-option">
                    <label for="">Gender:</label>
                    <select id="room" name="gender">
                        <option value={{ $user->gender }}>Choose Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="row" style="margin-left: 100px;">
                    <button class="col-md-4 mr-3" type="submit">Update Now</button>
                    <button class="col-md-4 mr-3" type="">
                        <a style="color:#e6ad74 " href="/profile/update/password">Reset Password</a>
                    </button>

                </div>
            </form>
        </div>

    </div>
@endsection
