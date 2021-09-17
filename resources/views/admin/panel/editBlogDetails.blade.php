@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Blog Details</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/admin/blog/add/details/'.$blog->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class=" mt-5 mb-5">
                            <label>Description</label>
                            <textarea class=" blogDetails" name="details"  >{!! $blog->details !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
