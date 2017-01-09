@extends("cms\layout")
@section("content")



 <link href="/Metronic/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<div class="row"><div class="col-md-12">
<form enctype="multipart/form-data" method="post" class="form-horizontal" action="/CMS/Article/edit/{{$item->id}}">
{{ csrf_field() }}

 <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input autofocus name="title" value="{{$item->title}}" type="text" class="form-control" id="title" placeholder="Title">
      <div class="text-danger">{{$errors->first('title')}}</div>
    </div>
  </div>
  
  
 <div class="form-group">
    <label for="date" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-10">
      <input name="date" value="{{date('Y/m/d',strtotime($item->date))}}" type="text" class="form-control date-picker" id="date" placeholder="Date">
      <div class="text-danger">{{$errors->first('date')}}</div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">Details</label>
    <div class="col-sm-10">
      <textarea rows="10" name="details" class="form-control summernote" id="details" placeholder="Details">{{$item->details}}</textarea>
      <div class="text-danger">{{$errors->first('details')}}</div>
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="image" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
      
      <input type="file" name="img" />
      @if($item->image!=NULL)
      <br>
      <img src="/uploads/medium/{{$item->image}}" class="img-thumbnail" />
      @endif
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div>
        <label>
          <input  {{$item->active?"checked":""}} name="active" type="checkbox"> Active
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Save</button>
      <a class="btn btn-default" href="/CMS/Article">Cancel</a>
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
                                <a href="/CMS/Article">Manage Articles</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>{{$title}}</span>
                            </li>
                        </ul>
                    </div>
@endsection()



@section("scripts")
 <script src="/Metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/Metronic/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script>
	$(function(){
		$(".summernote").summernote({height:400});
		$(".date-picker").datepicker({autoclose:true,format:"yyyy/mm/dd"});
	});
</script>
@endsection()

@section("css")
<link href="/Metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
@endsection()