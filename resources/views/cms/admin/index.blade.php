@extends("cms\layout")
@section("content")


<form class="row" action="/CMS/Admin/" method="get">
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
            <th>Full Name</th>     
            <th>Email</th>     
            <th>Phone</th>            
            <th width="10%">Active</th>            
            <th width="15%">Inserted Date</th>
            <th width="15%"></th>
        </tr>
    </thead>
    <tbody>

    @foreach($items as $item)
    <tr>
    	<td>{{$item->id}}</td>
    	<td>{{$item->fullname}}</td>
    	<td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
    	<td><a href="tel:{{$item->phone}}">{{$item->phone}}</a></td>
    	<td><input type="checkbox" {{$item->active?"checked":""}} /></td>
    	<td>{{$item->created_at}}</td>
        <td class="text-right">
          <a href="/CMS/Admin/permission/{{$item->id}}" class="btn btn-warning btn-xs IFrame"><i class="glyphicon glyphicon-lock"></i></a>
        
        <a href="/CMS/Admin/edit/{{$item->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
        
        <a href="/CMS/Admin/delete/{{$item->id}}" class="btn btn-danger btn-xs Confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
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