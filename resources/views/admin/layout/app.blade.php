<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Mediqu - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('assets_admin/images/favicon.png') }}">
    <link href=" {{ asset('assets_admin/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href=" {{ asset('assets_admin/vendor/chartist/css/chartist.min.css') }}">
    <link href=" {{ asset('assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('assets_admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

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
        @include("admin.layout.header")

        <div class="content-body">
            @yield("content")
        </div>

        @include("admin.layout.footer")
    </div>

    <script src="{{ asset('assets_admin/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/custom.min.js')}}"></script>
	<script src="{{ asset('assets_admin/js/deznav-init.js') }}"></script>
	<!-- Apex Chart -->
	{{-- <script src="{{ asset('assets_admin/vendor/apexchart/apexchart.js') }}"></script> --}}


	<!-- Dashboard 1 -->
	<script src=" {{ asset('assets_admin/js/dashboard/dashboard-1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
    @yield('js')
</body>
</html>
