@extends('frontend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">INFO BOOKING</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th><strong>ID</strong></th>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Content</strong></th>
                                    <th><strong>Status</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong class="idBlogs"></strong></td>
                                    <td class="titleBlogs"></td>
                                    <td>
                                        <div class="d-flex align-items-center"></div>
                                    </td>

                                    <td class="descBlogs"></td>
                                    <td class="descBlogs"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
