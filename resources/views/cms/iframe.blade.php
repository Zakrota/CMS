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
        <link rel="shortcut icon" href="/favicon.ico" /> </head>
    <!-- END HEAD -->
<style>body{background-color:#fff;}</style>
    <body>
        
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
		  });
      </script>
    </body>

</html>