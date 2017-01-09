@extends("layout")

@section("content")


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php $i=0; ?>
  @foreach($sliders as $s)
    <li data-target="#carousel-example-generic" data-slide-to="{{$i++}}" class="{{$i==1?"active":""}}"></li>
  @endforeach()
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php $i=0; ?>
    @foreach($sliders as $s)
    <div class="{{$i++==0?"item active":"item"}}">
      <img width="100%" src="/uploads/large/{{$s->image}}" alt="{{$s->title}}">
      <div class="carousel-caption">
      @if(strlen($s->url)>0)
      <a <?php echo $s->newwindow?"target=_blank":"" ?> href="{{$s->url}}">
        <h1>{{$s->title}}</h1>
        <h4>{{$s->subtitle}}</h4>
      </a>
      @else
      	 <h1>{{$s->title}}</h1>
        <h4>{{$s->subtitle}}</h4>
      @endif
      </div>
    </div>
    @endforeach()
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<hr>
<h1>Articles</h1>
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




@section("scripts")
@endsection()