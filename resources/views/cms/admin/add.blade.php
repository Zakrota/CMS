@extends("cms\layout")
@section("content")


<div class="row"><div class="col-md-8">
<form method="post" class="form-horizontal" action="/CMS/Admin/add">
{{ csrf_field() }}

 <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input autofocus name="fullname" value="{{old('fullname')}}" type="text" class="form-control" id="fullname" placeholder="Full Name">
      <div class="text-danger">{{$errors->first('fullname')}}</div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input autofocus name="email" value="{{old('email')}}" type="text" class="form-control" id="email" placeholder="Email">
      <div class="text-danger">{{$errors->first('email')}}</div>
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input autofocus name="password" value="{{old('password')}}" type="password" class="form-control" id="password" placeholder="Password">
      <div class="text-danger">{{$errors->first('password')}}</div>
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <input autofocus name="phone" value="{{old('phone')}}" type="text" class="form-control" id="phone" placeholder="Phone">
      <div class="text-danger">{{$errors->first('phone')}}</div>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div>
        <label>
          <input  {{old('active')?"checked":""}} name="active" type="checkbox"> Active
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Add</button>
      <a class="btn btn-default" href="/CMS/Admin">Cancel</a>
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
                                <a href="/CMS/Admin">Manage Admins</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>{{$title}}</span>
                            </li>
                        </ul>
                    </div>
@endsection()