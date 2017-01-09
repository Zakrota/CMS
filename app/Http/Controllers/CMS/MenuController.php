<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Menu;
use URL;

class MenuController extends CMSBaseController
{
	public function getIndex($id=0)
	{
		$items = Menu::where("isdelete","0")
					->where("parent_id",$id)
					->get();		
		
		$title="Manage Menus";
		$subtitle="Menus Section";
		return view("cms/menu/index",compact("title",
				"subtitle","items","id"));
	}
	public function getAdd($id=0)
	{
		$title="Add New Menu";
		$subtitle="Menus Section";
		return view("cms/menu/add",compact("title","subtitle","id"));
	}
	
	
	public function postAdd(Request $request,$id){
		$this->validate($request, 
		[
	        'title' => 'required',
	        'url' => 'required'
	    ],
		[
			'title.required'=>'Please enter Menu Title',
			'url.required'=>'Please enter Menu URL'
		]);		
		
		$menu = new Menu();
		$menu->title = $request->input("title");
		$menu->url = $request->input("url");
		$menu->parent_id = $id;
		$menu->active = $request->input("active")?1:0;
		$menu->newwindow = $request->input("newwindow")?1:0;
		$menu->isdelete = 0;
		$menu->create_admin_id = $this->adminid;
		
		if($menu->Add($menu)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Menu Added Successfully');
			return redirect("/CMS/Menu/add/$id");
		}
		else
		{
			Session::flash('msg', "e: $menu->title Already exists");
			return redirect("/CMS/Menu/add/$id")->withInput();
		}

	}
	
		
	public function getDelete($id){
		$menu = Menu::find($id);
		$menu->isdelete=1;
		$menu->update_admin_id = $this->adminid;
		$menu->save();
	    Session::flash('msg', 's:Menu Deleted Successfully');
		return redirect("/CMS/Menu");
	}
	
	public function getEdit($id){
		$item = Menu::find($id);
		if($item!=NULL)
		{
			$title="Edit Menu";
			return view("cms/menu/edit",compact("item","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid Menu ID');
			return redirect("/CMS/Menu");
		}
	}
	public function postEdit(Request $request,$id){
		$this->validate($request, 
		[
	        'title' => 'required',
	        'url' => 'required'
	    ],
		[
			'title.required'=>'Please enter Menu Title',
			'url.required'=>'Please enter Menu URL'
		]);				
		
		
		$menu = Menu::find($id);		
		$menu->title = $request->input("title");
		$menu->url = $request->input("url");
		$menu->active = $request->input("active")?1:0;
		$menu->newwindow = $request->input("newwindow")?1:0;
		$menu->update_admin_id = $this->adminid;
		
		
		if($menu->UpdateUnique($menu)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Menu Updated Successfully');
			return redirect("/CMS/Menu/");
		}
		else
		{
			Session::flash('msg', "e: $menu->title Already exists");
			return redirect("/CMS/Menu/edit/$menu->id")->withInput();
		}
				
	}		
}