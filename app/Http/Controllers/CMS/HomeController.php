<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Account;
use App\Country;
use URL;

class HomeController extends CMSBaseController
{
	public function getIndex()
	{
		$title="CMS Home Page";
		$subtitle="";
		//Session::flash("msg","s: Added successfully");
		return view("cms/home/index",compact("title","subtitle"));
	}
	public function getChangepassword()
	{
		$title="Change Password";
		$subtitle="";
		return view("cms/home/changepassword",compact("title","subtitle"));
	}
	
	function IsValidOldPassword($password)
	{
		$user = \Auth::User();
		
		$credentials2 = ['email' => $user->email, 
			'password' => $password];

		if (\Auth::validate($credentials2)) {
			return 1;
		}
		else
			return 0;
	}
	
	/*
	
	public function postChangepassword(Request $Request){
		$title="Change Password";
		
		$this->validate($Request, [
        'oldpassword' => 'required|min:6',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6'
    	]);	
		
		$credentials = $Request->only(
                    'email', 'password', 'password_confirmation'
        );
		$user = \Auth::User();
		if($this->IsValidOldPassword($Request->input("oldpassword")))		
		{				
			$user->password = bcrypt($credentials['password']);
			$user->save();
			Session::flash('msg', "s: Password Changed Successfully");
		}
		else
			Session::flash('msg', "e: Invalid Old Password");
		
		return view("CMS/Home/changepassword",compact("title"));
	}
	*/
	
	
	
	
	public function postChangepassword(Request $request)
	{
		$this->validate($request, 
		[
	        'currentpassword' => 'required',
	        'password' => 'required|confirmed',
    	    'password_confirmation' => 'required'
	    ]);	
		
		
		
		$credentials = $request->only(
             'email', 'password', 'password_confirmation'
        );
		$user = \Auth::User();
		if($this->IsValidOldPassword($request->input("currentpassword")))		
		{				
			$user->password = bcrypt($credentials['password']);
			$user->save();
			Session::flash('msg', "s: Password Changed Successfully");
		}
		else
			Session::flash('msg', "e: Invalid Old Password");
		
		return view("CMS/Home/changepassword",compact("title"));
		
		
	}
}