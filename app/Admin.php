<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
class Admin extends Model
{
    //
	protected $table = "admin";	

	public function Add(Admin $admin)
	{
		$isExists = Admin::where("email",$admin->email)->count();
		if(!$isExists)
		{
			$admin->save();
			return $admin->id;
		}
		else
			return -1;
	}
	
	public function UpdateUnique(Admin $admin)
	{
		$isExists = Admin::where("email",$admin->email)
		->where("id","!=",$admin->id)->count();
		if(!$isExists)
		{
			$admin->save();
			return $admin->id;
		}
		else
			return -1;
	}
	
	
	public function DeleteAdminLinks($admin_id)
	{
		$results = DB::table("admin_link")
			->where("admin_id",$admin_id)
			->delete();
	}
	
	public function AddAdminLink($admin_id,$link_id)
	{
		$results = DB::table("admin_link")
			->insert(["admin_id"=>$admin_id,"link_id"=>$link_id,]);
	}
}
