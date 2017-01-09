<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Account;
use App\Country;
use App\Menu;
use URL;

use View;
class FrontEndBaseController extends Controller
{
	function __construct() {		
		$menus = Menu::where("parent_id",0)->where("isdelete",0)->where("active",1)->get();
		//
    	View::share('menus', $menus);
	}
}
