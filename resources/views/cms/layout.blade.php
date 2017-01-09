<?php
	if(!isset($title))
		$title="";
	if(!isset($subtitle))
		$subtitle="";
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{$title}} | CMS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/Metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/Metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/Metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/Metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/Metronic/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/Metronic/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/Metronic/assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/Metronic/assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/Metronic/assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="/favicon.ico" /> 
        @yield("css")
        </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="/CMS/Home">
                        <img src="/Metronic/assets/layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
               
                <div class="page-top">
                    
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="/Metronic/assets/layouts/layout2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="/CMS/Home/changepassword">
                                            <i class="icon-user"></i> Change Password </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                   
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="/CMS/Home" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Home Page</span>
                            </a>
                        </li>
                        @foreach($adminlinks as $link)
                        
                        <?php
						$subLinks = App\Link::where("parentid",$link->id)->where("showinmenu",1)->whereRaw("link.id in (select link_id from admin_link where admin_id=$adminid)")->orderBy("orderid")->get();
						?>
                        
                        
                        <li class="nav-item start ">
                            <a href="{{$link->url}}" class="nav-link nav-toggle">
                                <i class="{{$link->icon}}"></i>
                                <span class="title">{{$link->title}}</span>
                            </a>
                            <ul class="sub-menu">
                              @foreach($subLinks as $subLink)
                              
                                <li class="nav-item start ">
                                    <a href="{{$subLink->url}}" class="nav-link ">
                                        <i class="{{$subLink->icon}}"></i>
                                        <span class="title">{{$subLink->title}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <h3 class="page-title"> {{$title}}
                        <small>{{$subtitle}}</small>
                    </h3>
                    @yield("pagebar")
                    
                    <div class="portlet light ">
                                
                                <div class="portlet-body">
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
                            </div>
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> {{date("Y")}} &copy; CMS Admin Panel.                
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        
         
<div class="modal fade" id="IFrame" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>      
        
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
        <script src="/Metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/Metronic/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/Metronic/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/Metronic/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        
      @yield("scripts")
      <script>
		  $(function(){
			  $(document).on("click",".Confirm",function(){
				  $("#Confirm").modal("show");
				  var url = $(this).attr("href");
				  $("#Confirm .btn-danger").attr("href",url);
				  return false;
			   });
			   
			   
			  $(document).on("click",".IFrame",function(){
				  $("#IFrame").modal("show");
				  var url = $(this).attr("href");
				  $("#IFrame .modal-body").html("<iframe width='100%' height=500px src='"+url+"' frameborder=0></iframe>");
				  return false;
			   });
		  });
      </script>
    </body>

</html>