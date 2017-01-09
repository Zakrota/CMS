<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Link extends Model
{
	protected $table = "link";
	
	public static function HasAdminThisLink($admin_id,$link_id)
	{
		$results = DB::table("admin_link")->where("admin_id",$admin_id)
		->where("link_id",$link_id)->count();
		return $results>0;
	}
	
}
