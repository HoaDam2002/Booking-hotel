@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="booking-form" style="width: 50%; margin-left: 310px">
            @if (session('success'))
                <div class="alert alert-success alert-dismissble">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
                    <h4><i class="icon fa fa-check"></i>Thông báo</h4>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissble">
                    {{-- <button type="button"F class="close" data-dismiss="alert" aria-hidden="true">x</button> --}}
                    <h4><i class="icon fa fa-check"></i>Thông báo</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Reset Password</h3>
            <form method="post" action="#">
                @csrf
                <div class="check-date">
                    <label for="">Current password:</label>
                    <input type="password" name="password" value="" class="">
                </div>
                <div class="check-date">
                    <label for="">Change password:</label>
                    <input name="password_change" type="password" value="" class="">
                </div>
                <div class="check-date">
                    <label for="">Comfirm password:</label>
                    <input name="password_comfirm" type="password" value="" class="">
                </div>
                <button type="submit">Reset Now</button>
            </form>"
        </div>

    </div>
@endsection
