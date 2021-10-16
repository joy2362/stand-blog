@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Site Setting</h4>
                </div>
                <div class="card-body">
                    <form method = "post" action="{{url('admin/setting/update')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Site Name</label>
                                    <input type="text" class="form-control" name="siteName" value="{{$name->option}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email-address</label>
                                    <input type="email" name="email" class="form-control" value="{{$email->option}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$phone->option}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{$facebook->option}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{$twitter->option}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{$linkedin->option}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Youtube</label>
                                    <input type="text" class="form-control" name="youtube" value="{{$youtube->option}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="address" rows="5">{{$address->option}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Us</label>
                                    <div class="form-group">
                                        <textarea class="form-control"  name='about' rows="5">{{$about->option}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Update Setting</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
