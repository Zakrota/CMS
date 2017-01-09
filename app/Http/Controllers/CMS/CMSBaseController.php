<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Account;
use App\Country;
use App\Link;
use URL;
use Auth;

use View;
use Intervention\Image\ImageManagerStatic as Image;
class CMSBaseController extends Controller
{
	protected $adminid=1;
	
	
	function __construct() {		
	    $this->middleware('auth');
		$admin=DB::table("admin")->where("user_id"
			,Auth::user()->id)->first();
			
			
		$links = Link::where("parentid",0)->where("showinmenu",1)		
		->get();
		
		
		
		$adminlinks = Link::where("parentid",0)->where("showinmenu",1)
		->whereRaw("link.id in (select link_id from admin_link where admin_id=$admin->id)")
		->get();
		
		
    	View::share('links', $links);
    	View::share('adminlinks', $adminlinks);
		View::share('adminid', $admin->id);
	}
	
	public function SaveResizedImage($image,$width,$path){
		$img = Image::make("uploads/$image");
		if($width>$img->width())
		{			
			$img->save("uploads/$path/$image");
			return 0;
		}
		// now you are able to resize the instance
		$newHeight = $width/$img->width() * $img->height();
		$img->resize($width, $newHeight );
				
		// finally we save the image as a new file
		$img->save("uploads/$path/$image");
	}
}