@extends("cms\iframe")
@section("content")


<div class="row">
<div class="col-md-8">
<form method="post" class="form-horizontal" action="/CMS/Admin/permission/{{$item->id}}">
{{ csrf_field() }}
  <ul class="list-unstyled permissions">
  	@foreach($links as $link)
    <?php
		$hasPermission=App\Link::HasAdminThisLink($item->id,$link->id);
	?>
    	<li>
        	<label><input name="permissions[]" {{$hasPermission?"checked":""}} type="checkbox" value="{{$link->id}}"> <b>{{$link->title}}</b></label>
            
            <?php				
			$subLinks = App\Link::where("parentid",$link->id)->orderBy("orderid")->get();
			?>
            @if($subLinks->count()>0)
            	<ul class="list-unstyled">
            	@foreach($subLinks as $subLink)
                <?php
		$hasPermission2=App\Link::HasAdminThisLink($item->id,$subLink->id);
	?>
                	<li>
                    	<label><input name="permissions[]"  {{$hasPermission2?"checked":""}}  type="checkbox" value="{{$subLink->id}}"> {{$subLink->title}}</label>
                    </li>
                @endforeach
                </ul>
            @endif
        </li>
    @endforeach
  </ul>

      <button type="submit" class="btn btn-success">Save Permissions</button>
</form>
</div>
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
                                <a href="/CMS/Admin">Manage Admins</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>{{$title}}</span>
                            </li>
                        </ul>
                    </div>
@endsection()



@section("scripts")
	<script>
		$(function(){
			$(".permissions :checkbox").click(function(e) {
                $(this).parent().next().find(":checkbox")
					.prop("checked",$(this).prop("checked"));
					
				$(this).closest("ul").prev().find(":checkbox").prop("checked",
					$(this).closest("ul").find(":checked").size()>0);
            });
		});
    </script>
@endsection()

