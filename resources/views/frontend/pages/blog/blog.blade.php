@extends('frontend.layouts.app')

@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Blog</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>Blog Grid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                @if (!empty($data))
                    @foreach ($data as $value)
                        @php
                            $dateTime = \Carbon\Carbon::parse($value->created_at)->format('Y-m-d');
                            
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item set-bg " data-setbg="upload/admin/blogs/{{ $value->image }}"
                                style="background-image: url(&quot;upload/admin/blogs/{{ $value->image }}&quot;);">
                                <div class="bi-text">
                                    <h4><a href="/blog/detail/{{ $value->id }}">{{ $value->title }}</a></h4>
                                    <div class="b-time"><i class="icon_clock_alt"></i> {{ $dateTime }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if (isset($data))
                <div class="pagination-area">
                    <ul class="pagination">
                        {{ $data->links() }}
                    </ul>
                </div>
            @endif
        </div>
    </section>
    <div class="search-model" style="display: none;">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
@endsection
