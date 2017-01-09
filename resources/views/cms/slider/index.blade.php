@extends("cms\layout")
@section("content")



<form class="row" action="/CMS/Slider/" method="get">
 <div class="col-lg-6">
    <div class="input-group">
      <input name="q" value="{{$q}}" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div>
</form>
@if($items->count()>0)
<br>
<table class="table table-hover">
	<thead>
    	<tr>
        	<th width="10%">#</th>
            <th>Title</th>            
            <th width="10%">Active</th>  
            <th width="10%">New Window</th>            
            <th width="15%">Inserted Date</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>

    @foreach($items as $item)
    <tr>
    	<td>{{$item->id}}</td>
    	<td>{{$item->title}}</td>
    	<td><input type="checkbox" {{$item->active?"checked":""}} /></td>
    	
    	<td><input type="checkbox" {{$item->newwindow?"checked":""}} /></td>
    	<td>{{$item->created_at}}</td>
        <td class="text-right">
        <a href="/CMS/Slider/edit/{{$item->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
        
        <a href="/CMS/Slider/delete/{{$item->id}}" class="btn btn-danger btn-xs Confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    @endforeach() 
    </tbody>
</table>
@else
	<br>
	<div class="alert alert-info">There is no result(s) to display</div>
@endif

<div class="text-center">
{!! $items->render(); !!}
</div>

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
                                <span>{{$title}}</span>
                            </li>
                        </ul>
                    </div>
@endsection()