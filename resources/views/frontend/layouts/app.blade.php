<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona</title>
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('frontend/img/icon/favicon-16x16.png') }}">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <style>
        .pagination .pagination-next,
        .pagination .pagination-previous {
            font-size: 14px;
            /* Đặt kích thước phù hợp cho phông chữ */
            padding: 5px 10px;
            /* Đặt kích thước phù hợp cho padding */
        }
    </style> --}}
</head>

<body>
    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')


    <!-- Js Plugins -->

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>


</body>

</html>
