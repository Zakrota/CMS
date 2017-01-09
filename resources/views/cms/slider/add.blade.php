@extends("cms\layout")
@section("content")



<div class="row"><div class="col-md-8">
<form method="post" enctype="multipart/form-data" class="form-horizontal" action="/CMS/Slider/add">
{{ csrf_field() }}

 <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input autofocus name="title" value="{{old('title')}}" type="text" class="form-control" id="title" placeholder="Title">
      <div class="text-danger">{{$errors->first('title')}}</div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="subtitle" class="col-sm-2 control-label">Sub Title</label>
    <div class="col-sm-10">
      <input name="subtitle" value="{{old('subtitle')}}" type="text" class="form-control" id="subtitle" placeholder="Sub Title">
      <div class="text-danger">{{$errors->first('subtitle')}}</div>
    </div>
  </div>
  
  
  
  
  <div class="form-group">
    <label for="url" class="col-sm-2 control-label">URL</label>
    <div class="col-sm-10">
      <input name="url" value="{{old('url')}}" type="text" class="form-control" id="url" placeholder="URL">
      <div class="text-danger">{{$errors->first('url')}}</div>
    </div>
  </div>
  
  
 <div class="form-group">
    <label for="image" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
      
      
      <input type="file" id="img" name="img" />
      <img class="img-responsive" />
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
      <div>
        <label>
          <input  {{old('newwindow')?"checked":""}} name="newwindow" type="checkbox"> New Window
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Add</button>
      <a class="btn btn-default" href="/CMS/Slider">Cancel</a>
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
                                <a href="/CMS/Slider">Manage Sliders</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>{{$title}}</span>
                            </li>
                        </ul>
                    </div>
@endsection()

@section("scripts")
<script>
	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').next().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

	$("#img").change(function(){
		readURL(this);
	});
</script>
@endsection()