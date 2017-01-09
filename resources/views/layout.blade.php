<?php $url = $_SERVER['REQUEST_URI'];//الرابط الذي نحن به حاليا
	  if($url=="/FrontEnd/index" || $url=="/FrontEnd/" )
	  {
		  $url="/";
	  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Layout</title>
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">CMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          	@foreach($menus as $m)
             <?php
				$subMenu = App\Menu::where("parent_id",$m->id)->where("isdelete",0)->where("active",1)->get();
			?>
            @if($subMenu->count()>0)
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$m->title}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @foreach($subMenu as $m2)
                <li><a href="{{$m2->url}}">{{$m2->title}}</a></li>
                @endforeach()
              </ul>
            </li>
            @else
            <li {{$url==$m->url?"class=active":""}}><a href="{{$m->url}}">{{$m->title}}</a></li>
            @endif
            @endforeach()
          </ul>
          
           <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                            <li><a href="/CMS"><i class="fa fa-btn fa-sign-out"></i>Control Panel</a></li>
                            
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Begin page content -->
    <div class="container">
    
    
	  @if(Session::get("msg")!=NULL)
      <?php
	  	$msgClass="alert-info";
		$msg=Session::get("msg");
		if(strpos($msg,"s:")===0){
			$msgClass="alert-success";$msg=substr($msg,2);//قص اول حرفين
		}
		else if(strpos($msg,"e:")===0){
			$msgClass="alert-danger";$msg=substr($msg,2);//قص اول حرفين
		}
		else if(strpos($msg,"i:")===0){
			$msgClass="alert-info";$msg=substr($msg,2);//قص اول حرفين
		}
		else if(strpos($msg,"w:")===0){
			$msgClass="alert-warning";$msg=substr($msg,2);//قص اول حرفين
		}
	  ?>
	  	<div class="alert {{$msgClass}}"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>{{$msg}}</div>
	  @endif
      @yield("content")
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>


<div class="modal fade" id="Confirm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to continue?</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger">Yes, sure</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	
      @yield("scripts")
      <script>
		  $(function(){
			  $(document).on("click",".Confirm",function(){
				  $("#Confirm").modal("show");
				  var url = $(this).attr("href");
				  $("#Confirm .btn-danger").attr("href",url);
				  return false;
			   });
		  });
      </script>
  </body>
</html>
