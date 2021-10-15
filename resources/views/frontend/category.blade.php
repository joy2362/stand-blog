@extends('layouts.theme')
@section('Content')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Category</h4>
                            <h2>{{$category->name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Banner Ends Here -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <span>Stand Blog HTML5 Template</span>
                                <h4>Creative HTML Template For Bloggers!</h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-button">
                                    <a href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @foreach($posts as $row)
                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{url( $row->poster)}}" alt="{{$row->title}}">
                                        </div>
                                        <div class="down-content">
                                            <span>{{$row->categoryName->name}}</span>
                                            <a href="{{url('/post/'.$row->id)}}">><h4>{{$row->title}}</h4></a>
                                            <ul class="post-info">
                                                <li><a href="#">{{$row->user->name}}</a></li>
                                                <li><a href="#">{{\Carbon\Carbon::parse($row->updated_at)->isoFormat('MMM OD, G')}}</a></li>
                                                <li><a href="#">{{$row->total_comment}} Comments</a></li>
                                            </ul>
                                            <p> {!!Str::limit(strip_tags( $row->details , 150)) !!}</p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            @foreach($row->tags as $tag)
                                                                <li><a href="#">{{$tag->name}}</a>,</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.sideContent')
            </div>
        </div>
    </section>
@endsection
