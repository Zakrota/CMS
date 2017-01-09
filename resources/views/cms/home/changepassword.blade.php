@extends("cms\layout")
@section("content")



<div class="row"><div class="col-md-8">
<form method="post" class="form-horizontal" action="/CMS/Home/changepassword">
{{ csrf_field() }}

 <div class="form-group">
    <label for="title" class="col-sm-4 control-label">Current Password</label>
    <div class="col-sm-8">
      <input autofocus name="currentpassword" value="{{old('currentpassword')}}" type="password" class="form-control" id="currentpassword" placeholder="Current Password">
      <div class="text-danger">{{$errors->first('currentpassword')}}</div>
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="password" class="col-sm-4 control-label">New Password</label>
    <div class="col-sm-8">
      <input name="password" value="{{old('password')}}" type="password" class="form-control" id="password" placeholder="New Password">
      <div class="text-danger">{{$errors->first('password')}}</div>
    </div>
  </div>
  
  
 <div class="form-group">
    <label for="password_confirmation" class="col-sm-4 control-label">Confirm New Password</label>
    <div class="col-sm-8">
      <input name="password_confirmation" value="{{old('password_confirmation')}}" type="password" class="form-control" id="password_confirmation" placeholder="Confirm New Password">
      <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-success">Change Password</button>
      <a class="btn btn-default" href="/CMS/Home">Cancel</a>
    </div>
  </div>
</form>
</div></div>



@endsection()


@section("pagebar")
<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="/CMS/Home">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Change Password</span>
                            </li>
                        </ul>
                    </div>
@endsection()