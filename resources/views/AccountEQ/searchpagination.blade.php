@extends("layout")

@section("content")

<form class="row" action="/AccountEQ/searchpagination" method="get">
 <div class="col-lg-6">
    <div class="input-group">
      <input name="q" value="{{$q}}" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div>
</form>
@if($accounts->count()>0)
<br>
<table class="table table-hover">
	<thead>
    	<tr>
        	<th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Active</th>            
            <th>Gender</th>         
            <th>Country</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    @foreach($accounts as $account)
    <tr class="{{$account->active==0?'danger':''}}">
    	<td>{{$account->id}}</td>
    	<td>{{$account->fullname}}</td>
    	<td>{{$account->email}}</td>
    	<td>{{$account->active}}</td>
    	<td>{{$account->gender}}</td>
    	<td>{{$account->country->name}}</td>
        <td class="text-right">
        <a href="/AccountEQ/edit/{{$account->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
        
        <a href="/AccountEQ/delete/{{$account->id}}" class="btn btn-danger btn-xs Confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    @endforeach() 
    </tbody>
</table>
@else
	<br>
	<div class="alert alert-info">There is no result(s) to display</div>
@endif

<div class="text-center">
{!! $accounts->render(); !!}
</div>

@endsection()




@section("scripts")
@endsection()