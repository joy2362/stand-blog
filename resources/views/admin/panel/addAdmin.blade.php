@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Admin</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.register')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" name="name" autofocus>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" class="form-control" name="email" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="password" class="form-control" name="password" >
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input  type="checkbox"  id="admin" name="admin" value="1">
                                    <label  for="admin">
                                        Admin
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input  type="checkbox"  id="category" name="category" value="1">
                                    <label  for="category">
                                        Category
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
