@extends("cms\layout")
@section("content")


<a class="btn btn-success" href="/CMS/Menu/add/{{$id}}"><i class="fa fa-plus"></i> Add New Menu</a>

@if($id!=0)
<a class="btn btn-default" href="/CMS/Menu/index/0"><i class="fa fa-reply"></i> Back</a>
@endif
<hr>
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
            <th width="15%"></th>
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
        @if($id==0)
         <a href="/CMS/Menu/index/{{$item->id}}" class="btn btn-success btn-xs"><i class="fa fa-list"></i></a>
        @endif
        <a href="/CMS/Menu/edit/{{$item->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
        
        <a href="/CMS/Menu/delete/{{$item->id}}" class="btn btn-danger btn-xs Confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    @endforeach() 
    </tbody>
</table>
@else
	<br>
	<div class="alert alert-info">There is no result(s) to display</div>
@endif

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