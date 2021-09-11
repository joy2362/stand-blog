@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Category</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/admin/category/add')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" name="name" >
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Slug</label>
                                    <input type="text" class="form-control" name="slug" >
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
