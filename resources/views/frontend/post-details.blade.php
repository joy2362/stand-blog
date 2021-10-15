@extends('layouts.theme')
@section('Content')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Blog Details</h4>
                            <h2>{{$post->title}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{url($post->poster)}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{$post->categoryName->name}}</span>
                                        <h4>{{$post->title}}</h4>
                                        <ul class="post-info">
                                            <li><a href="#">{{$post->user->name}}</a></li>
                                            <li><a href="#">{{\Carbon\Carbon::parse($post->updated_at)->isoFormat('MMM OD, G')}}</a></li>
                                            <li><a href="#">{{$post->total_comment}} Comments</a></li>
                                        </ul>
                                        <p>{!! $post->details !!}</p>

                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        @foreach($post->tags as $tag)
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
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>{{$post->total_comment}} comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach($post->comments as $row)
                                                <li>
                                                    <div class="right-content">
                                                        <h4>{{$row->name}}<span>{{$row->email}}</span></h4>
                                                        <p>{{$row->comment}}</p>
                                                    </div>
                                                </li>
                                            <br>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="{{url('/comment/create/'.$post->id)}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name" placeholder="Your name" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="email" type="text" id="email" placeholder="Your email" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.sideContent')
            </div>
        </div>
    </section>
@endsection
