@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="card-title">Revenue</h4>
                <div class="dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle light" data-toggle="dropdown" aria-expanded="false">
                        2020
                    </button>
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" href="#">2020</a>
                        <a class="dropdown-item" href="#">2019</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-2">
                <h3 class="text-primary font-w600">$41,512k <small class="text-dark ml-2">$25,612k</small></h3>
                <div id="chartBar"></div>
            </div>
        </div>
    </div>
</div>
@endsection
