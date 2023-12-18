<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sona</title>
    <!-- Favicon icon -->
    {{-- <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('frontend/img/icon/favicon-16x16.png') }}"> --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/icon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href=" {{ asset('assets_admin/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('assets_admin/vendor/chartist/css/chartist.min.css') }}">
    <link href=" {{ asset('assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet">

    <link href=" {{ asset('assets_admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/style.css') }}" rel="stylesheet">

    {{-- Datepicker --}}
    <!-- Clockpicker -->
    <link href="{{ asset('assets_admin/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('assets_admin/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="{{ asset('assets_admin/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/pickadate/themes/default.date.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet">

    <link href="{{ asset('assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- Sử dụng Bootstrap 4 CSS và JavaScript thay vì Bootstrap 5 -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


    {{-- Phân trang --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}


</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('admin.layout.header')

        <div class="content-body">
            @yield('content')
        </div>

        @include('admin.layout.footer')
    </div>

    {{-- <script src="{{ asset('assets_admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/deznav-init.js') }}"></script> --}}
    <!-- Apex Chart -->
    {{-- <script src="{{ asset('assets_admin/vendor/apexchart/apexchart.js') }}"></script> --}}


    <!-- Dashboard 1 -->
    <script src=" {{ asset('assets_admin/js/dashboard/dashboard-1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    {{-- jquery --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Required vendors -->
    <script src="{{ asset('assets_admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/deznav-init.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('assets_admin/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Chart ChartJS plugin files -->
    {{-- <script src="{{ asset('assets_admin/vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets_admin/js/plugins-init/chartjs-init.js') }}"></script>
    {{-- <script src="{{ asset('assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}

    {{-- picker --}}
    <script src="{{ asset('assets_admin/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- clockpicker -->
    <script src="{{ asset('assets_admin/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <!-- asColorPicker -->
    <script src="{{ asset('assets_admin/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
    <!-- Material color picker -->
    <script
        src="{{ asset('assets_admin/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <!-- pickdate -->
    <script src="{{ asset('assets_admin/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/pickadate/picker.date.js') }}"></script>



    <!-- Daterangepicker -->
    <script src="{{ asset('assets_admin/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('assets_admin/js/plugins-init/clock-picker-init.js') }}"></script>
    <!-- asColorPicker init -->
    <script src="{{ asset('assets_admin/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('assets_admin/js/plugins-init/material-date-picker-init.js') }}"></script>
    <!-- Pickdate -->
    <script src="{{ asset('assets_admin/js/plugins-init/pickadate-init.js') }}"></script>

    @yield('js')
</body>

</html>
