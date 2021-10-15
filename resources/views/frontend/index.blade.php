@extends('layouts.theme')
@section('Content')
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach($sliders as $row)
            <div class="item">
                <img src="{{url( $row->poster)}}" alt="poster" width="436" height="378">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>{{$row->categoryName->name}}</span>
                        </div>
                        <a href="{{url('/post/'.$row->id)}}"><h4>{{$row->title}}</h4></a>
                        <ul class="post-info">
                            <li><a href="#">{{$row->user->name}}</a></li>
                            <li><a href="#">{{\Carbon\Carbon::parse($row->updated_at)->isoFormat('MMM OD, G')}}</a></li>
                            <li><a href="#">{{$row->total_comment}} Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
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
                                <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        @foreach($blogs as $row)
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="{{url($row->poster)}}" alt="" width="730" height="325">
                                </div>
                                <div class="down-content">
                                    <span>{{$row->categoryName->name}}</span>
                                    <a href="{{url('/post/'.$row->id)}}"><h4>{{$row->title}}</h4></a>
                                    <ul class="post-info">
                                        <li><a href="#">{{$row->user->name}}</a></li>
                                        <li><a href="#">{{\Carbon\Carbon::parse($row->updated_at)->isoFormat('MMM OD, G')}}</a></li>
                                        <li><a href="#">{{$row->total_comment}} Comments</a></li>
                                    </ul>
                                    <p> {!!Str::limit(strip_tags( $row->details , 150)) !!}</p>

                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    @foreach($row->tags as $tag)
                                                    <li><a href="#">{{$tag->name}}</a>,</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="blog.html">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($recentPosts as $row)
                                        <li><a href="{{url('/post/'.$row->id)}}">
                                                <h5>{{$row->title}}</h5>
                                                <span> {{\Carbon\Carbon::parse($row->updated_at)->isoFormat('MMM OD, G')}}</span>
                                            </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Categories</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                       @foreach($category as $row)
                                        <li><a href="#">- {{$row->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($tags as $row)
                                        <li><a href="#">{{$row->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
