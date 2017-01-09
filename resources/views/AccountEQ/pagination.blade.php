@extends("layout")

@section("content")
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


<div class="text-center">
{!! $accounts->render(); !!}
</div>

@endsection()




@section("scripts")
@endsection()