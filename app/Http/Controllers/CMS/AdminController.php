<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Admin;
use App\User;
use URL;

class AdminController extends CMSBaseController
{
	public function getIndex(Request $r)
	{
		$q=$r->input("q");		
		$items = Admin::where("fullname","like","%$q%")
					->where("isdelete","0")
					->orderBy('id', 'DESC')
					->paginate(10)->appends("q",$q);		
		
		$title="Manage Admins";
		$subtitle="Admins Section";
		return view("cms/admin/index",compact("title",
				"subtitle","items","q"));
	}
	public function getAdd()
	{
		$title="Add New Admin";
		$subtitle="Admins Section";
		return view("cms/admin/add",compact("title","subtitle"));
	}
	
	
	public function postAdd(Request $request){
		$this->validate($request, 
		[
	        'fullname' => 'required',
	        'password' => 'required',
    	    'email' => 'required|email'
	    ],
		[
			'email.required'=>'Please enter Admin Email',
			'fullname.required'=>'Please enter Admin Full Name'
		]);	
		
		$admin = new Admin();
		$admin->fullname = $request->input("fullname");
		$admin->email = $request->input("email");
		$admin->phone = $request->input("phone");
		$admin->active = $request->input("active")?1:0;
		$admin->isdelete = 0;
		$admin->create_admin_id = $this->adminid;
		
		$isExistUser = User::where("email",$admin->email)->count();	
		if($isExistUser)
		{
			Session::flash('msg', "e: $admin->email Already exists in Users Table");
			return redirect("/CMS/Admin/add")->withInput();
		}
		
		$user = new User();
		$user->name = $request->input("fullname");
		$user->email = $request->input("email");
		$user->password =  bcrypt($request->input("password"));
		$user->save();
		
		$admin->user_id=$user->id;
		
		
		
		if($admin->Add($admin)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Admin Added Successfully');
			return redirect("/CMS/Admin/add");
		}
		else
		{
			Session::flash('msg', "e: $admin->email Already exists");
			return redirect("/CMS/Admin/add")->withInput();
		}
	}
	
		
	public function getDelete($id){
		$admin = Admin::find($id);
		$admin->isdelete=1;
		$admin->update_admin_id = $this->adminid;
		$admin->save();
	    Session::flash('msg', 's:Admin Deleted Successfully');
		return redirect("/CMS/Admin");
	}
	
	public function getEdit($id){
		$item = Admin::find($id);
		if($item!=NULL)
		{
			$title="Edit Admin";
			return view("cms/admin/edit",compact("item","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid Admin ID');
			return redirect("/CMS/Admin");
		}
	}
	public function postEdit(Request $request,$id){
		$this->validate($request, 
		[
	        'fullname' => 'required',
    	    'email' => 'required|email'
	    ],
		[
			'email.required'=>'Please enter Admin Email',
			'fullname.required'=>'Please enter Admin Full Name'
		]);		
		
		
		
		$admin = Admin::find($id);
		$admin->fullname = $request->input("fullname");
		$admin->email = $request->input("email");
		$admin->phone = $request->input("phone");
		$admin->active = $request->input("active")?1:0;
		$admin->isdelete = 0;
		$admin->update_admin_id = $this->adminid;
		//$admin->save();
		if($admin->UpdateUnique($admin)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Admin Updated Successfully');
			return redirect("/CMS/Admin/");
		}
		else
		{
			Session::flash('msg', "e: $admin->email Already exists");
			return redirect("/CMS/Admin/edit/$admin->id")->withInput();
		}
				
	}	
	/*****************************************/
	
	public function getPermission($id){
		$item = Admin::find($id);
		if($item!=NULL)
		{
			$title="Admin Permission";
			return view("cms/admin/permission",compact("item","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid Admin ID');
			return redirect("/CMS/Admin");
		}
	}
	public function postPermission(Request $request,$id){
		$admin = Admin::find($id);	
		$admin->DeleteAdminLinks($id);
		foreach($request->input("permissions") as $linkId)
			$admin->AddAdminLink($id,$linkId);
			
		Session::flash('msg', 's:Admin Permissions Saved Successfully');
		return redirect("/CMS/Admin/permission/$id");
	}		
}