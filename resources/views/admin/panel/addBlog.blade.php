@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Blog</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/admin/blog/add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" class="form-control" name="title" autofocus >
                        </div>
                        <div class="form-group mt-5">
                            <label>Tags :
                                    <span class="badge badge-info"></span>
                            </label>
                            <br>
                            <input type="text" data-role="tagsinput" name="tags" class=" tags"  >
                        </div>
                        <div class="form-group mt-5">
                            <label>Category </label>
                            <br>
                        <select class="custom-select" name="category">
                            @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group mt-5 mb-5">
                            <label for="poster" class="custom-file-label">Poster</label>
                            <input class="custom-file-input" id="poster" type="file" name="poster" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
