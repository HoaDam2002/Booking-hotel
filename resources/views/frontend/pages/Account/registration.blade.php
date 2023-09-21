<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RegistrationForm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ asset('/asset_accout/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('/asset_accout/css/style.css') }}">
</head>

<body>

    <div class="wrapper" style="background-image: url('/asset_accout/images/1.jpg');">
        <div class="inner">
            <div class="button-holder">
                <a href="{{ url('/') }}" class="button-holder">Trang Chủ</a>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
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
                @csrf
                <h3>Registration Form</h3>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Username:</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Email:</label>
                        <div class="form-holder">
                            <i style="font-style: normal; font-size: 15px;">@</i>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Password:</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-lock-outline"></i>
                            <input type="password" name="password" class="form-control" placeholder="********">
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Repeat Password:</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-lock-outline"></i>
                            <input type="password" name="password_comfirm" class="form-control" placeholder="********">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Street:</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-lock-outline"></i>
                            <input type="text" name="street" class="form-control">
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Gender:</label>
                        <div class="form-holder select">
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <i class="zmdi zmdi-face"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Avatar:</label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-lock-outline"></i> --}}
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Phone:</label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-lock-outline"></i> --}}
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-end">
                    <div class="checkbox">
                        {{-- <label>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label> --}}
                    </div>
                    <div class="button-holder">
                        <button type="submit">Register Now</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
