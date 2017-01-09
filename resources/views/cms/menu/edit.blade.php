@extends("cms\layout")
@section("content")




<div class="row"><div class="col-md-8">
<form method="post" class="form-horizontal" action="/CMS/Menu/edit/{{$item->id}}">
{{ csrf_field() }}

 <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input autofocus name="title" value="{{$item->title}}" type="text" class="form-control" id="title" placeholder="Title">
      <div class="text-danger">{{$errors->first('title')}}</div>
    </div>
  </div>
  
  
  
  
  
  <div class="form-group">
    <label for="url" class="col-sm-2 control-label">URL</label>
    <div class="col-sm-10">
      <input name="url" value="{{$item->url}}" type="text" class="form-control" id="url" placeholder="URL">
      <div class="text-danger">{{$errors->first('url')}}</div>
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
      <div>
        <label>
          <input  {{$item->newwindow?"checked":""}} name="newwindow" type="checkbox"> New Window
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Save</button>
      <a class="btn btn-default" href="/CMS/Menu">Cancel</a>
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
                                <a href="/CMS/Menu">Manage Menus</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>{{$title}}</span>
                            </li>
                        </ul>
                    </div>
@endsection()