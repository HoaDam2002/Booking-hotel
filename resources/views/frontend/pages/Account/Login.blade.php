<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ asset('/asset_accout/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('/asset_accout/css/style.css') }}">
</head>

<body>

    <div class="wrapper" style="background-image: url('/asset_accout/images/1.jpg')">
        <div class="inner">
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
            <div class="button-holder">
                <a href="{{ url('/') }}" class="button-holder">Trang Chủ</a>
            </div>
            <form action="" method="POST">
                @csrf
                <h3>Đăng Nhập</h3>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Email:</label>
                        <div class="form-holder">
                            <i style="font-style: normal; font-size: 15px;">@</i>
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Password:</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-lock-outline"></i>
                            <input type="password" name="password" class="form-control" placeholder="********">
                        </div>
                    </div>
                </div>
                <div class="form-end">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember_me"> Remember password
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="button-holder">
                        <button type="submit">Login now</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
