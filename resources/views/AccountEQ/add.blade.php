@extends("layout")

@section("content")
@if (count($errors) > 0)
   <!-- <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> -->
@endif
<div class="row"><div class="col-md-8">
<form method="post" class="form-horizontal" action="/Account/add">
{{ csrf_field() }}

 <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input autofocus name="email" value="{{old('email')}}" type="text" class="form-control" id="email" placeholder="Email">
      <div class="text-danger">{{$errors->first('email')}}</div>
    </div>
  </div>
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input name="fullname" value="{{old('fullname')}}" type="text" class="form-control" id="fullname" placeholder="Full Name">
      <div class="text-danger">{{$errors->first('fullname')}}</div>
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
      <select class="form-control" name="country">
      <option value="">Select Country</option>
      @foreach($countries as $country)
      	<option {{$country->id==old('country')?"selected":""}} value="{{$country->id}}" >{{$country->name}}</option>
      @endforeach
      </select>
      <div class="text-danger">{{$errors->first('country')}}</div>
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">Gender</label>
    <div class="col-sm-10">
      <label><input {{old('gender')=='M'?"checked":""}} type="radio" name="gender" value="M"> Male</label>
      <label><input {{old('gender')=='F'?"checked":""}} type="radio" name="gender" value="F"> Female</label>
     	<div class="text-danger">{{$errors->first('gender')}}</div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input  {{old('active')?"checked":""}} name="active" type="checkbox"> Active
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Add</button>
      <a class="btn btn-default" href="/AccountEQ">Cancel</a>
    </div>
  </div>
</form>
</div></div>

@endsection()




@section("scripts")
@endsection()