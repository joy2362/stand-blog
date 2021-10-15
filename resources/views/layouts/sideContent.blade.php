@php
    $recentPosts = \App\Models\BlogPost::latest()->take(4)->get();
    $category = \App\Models\category::all();
    $tags = \App\Models\BlogPost::existingTags();
@endphp

<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="post" action="{{url('search')}}">
                        @csrf
                        <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
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
                                <li><a href="{{url('/category/'.$row->id)}}">- {{$row->name}}</a></li>
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
                                <li><a href="{{url('/tag/'.$row->name)}}">{{$row->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
