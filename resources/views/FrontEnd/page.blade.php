@extends("layout")

@section("content")


<h1>{{$page[0]->title}}</h1>
<hr>

<div class="row">
	<div class="col-sm-8 text-justify">
    	{!! $page[0]->details !!}
    </div>
   	<div class="col-sm-4">
    @if(strlen($page[0]->image)>0)
     <img width="100%" src="/uploads/large/{{$page[0]->image}}">
     @endif()
    </div>
</div>


@endsection()