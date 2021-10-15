@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Blog</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/admin/blog/update/'.$blog->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" class="form-control" name="title" autofocus value="{{$blog->title}}">
                        </div>
                        <div class="form-group mt-5">
                            <label>Tags : @foreach($blog->tags as $tag)
                                    <span class="badge badge-info">{{$tag->name}}</span>
                                @endforeach </label>
                            <br>
                            <input type="text" data-role="tagsinput" name="tags" class=" tags"  >
                        </div>
                        <div class="form-group mt-5">
                            <label>Category </label>
                            <br>
                            <select class="custom-select" name="category">
                                @foreach($category as $row)
                                    <option value="{{$row->id}}" @if($row->id == $blog->category) selected @endif>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-5">
                            <img src="{{asset($blog->poster)}}" alt="poster" height="250" width="250">
                        </div>
                        <div class="form-group mt-5 mb-5">
                            <label for="poster" class="custom-file-label">Poster</label>
                            <input class="custom-file-input" id="poster" type="file" name="poster" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
