@extends("layout")

@section("content")


<h1>{{$article[0]->title}}</h1>
<hr>
<div class="row">
	<div class="col-sm-8 text-justify">
    	{!! $article[0]->details !!}
    </div>
   	<div class="col-sm-4">
    @if(strlen($article[0]->image)>0)
     <img width="100%" src="/uploads/large/{{$article[0]->image}}">
     @endif()
    </div>
</div>

<hr>
<h3>Read more</h3>

<div class="row">
	@foreach($articles as $s)
    <div class="col-sm-6 article col-md-3">
    	<div  class="imgCrop"><a href="/FrontEnd/article/{{$s->id}}"><img  class="img-responsive" src="/uploads/medium/{{$s->image}}" /></a></div>
        <p><b>{{$s->title}}</b></p>
        <a href="/FrontEnd/article/{{$s->id}}" class="btn btn-primary">Read more</a>
    </div>
    @endforeach()
</div>


@endsection()