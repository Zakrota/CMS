<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\StaticPage;
use URL;
use Illuminate\Support\Facades\Input;


class StaticPageController extends CMSBaseController
{
	public function getIndex(Request $r)
	{
		$q=$r->input("q");		
		$items = StaticPage::where("title","like","%$q%")
					->where("isdelete","0")
					->orderBy('id', 'DESC')
					->paginate(10)->appends("q",$q);		
		
		$title="Manage Static Pages";
		$subtitle="Static Pages Section";
		return view("cms/staticpage/index",compact("title",
				"subtitle","items","q"));
	}
	public function getAdd()
	{
		$title="Add New Static Page";
		$subtitle="Static Pages Section";
		return view("cms/staticpage/add",compact("title","subtitle"));
	}
	
	
	public function postAdd(Request $request){
		$this->validate($request, 
		[
	        'title' => 'required',
    	    'details' => 'required'
	    ],
		[
			'title.required'=>'Please enter Static Page Title',
			'details.required'=>'Please enter Static Page Details'
		]);		
		
		$staticpage = new StaticPage();
		
		
		if ($request->file('img')!=NULL 
			&& $request->file('img')->isValid()) {
		  $destinationPath = 'uploads'; // upload path
		  // getting image extension
		  $extension = strtolower($request->file('img')->getClientOriginalExtension()); 
		  if($extension=="jpg" || $extension=="jpeg" || $extension=="png"){
		  $staticpage->image = uniqid().".$extension"; // renameing image
		  $request->file('img')->move($destinationPath, $staticpage->image); 
		  // uploading file to given path
		  $this->SaveResizedImage($staticpage->image,400,"medium");
		  $this->SaveResizedImage($staticpage->image,150,"thumb");
		  $this->SaveResizedImage($staticpage->image,700,"large");
		  }
		  else{
			Session::flash('msg', "e:Please select valid Image");
			return redirect()->action('CMS\StaticPageController@getAdd')
							 ->withInput(Input::all());
		  }
		}
		else {
		  // sending back with error message.
		  Session::flash('msg', 'e:You Must Select Image');
		  return  redirect()->action('CMS\StaticPageController@getAdd')
							->withInput(Input::all());
		}
		
		
		$staticpage->title = $request->input("title");
		$staticpage->details = $request->input("details");
		$staticpage->active = $request->input("active")?1:0;
		$staticpage->isdelete = 0;
		$staticpage->create_admin_id = $this->adminid;
		
		if($staticpage->Add($staticpage)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Page Added Successfully');
			return redirect("/CMS/StaticPage/add");
		}
		else
		{
			Session::flash('msg', "e: $staticpage->title Already exists");
			return redirect("/CMS/StaticPage/add")->withInput();
		}

	}
	
		
	public function getDelete($id){
		$staticpage = StaticPage::find($id);
		$staticpage->isdelete=1;
		$staticpage->update_admin_id = $this->adminid;
		$staticpage->save();
	    Session::flash('msg', 's:StaticPage Deleted Successfully');
		return redirect("/CMS/StaticPage");
	}
	
	public function getEdit($id){
		$item = StaticPage::find($id);
		if($item!=NULL)
		{
			$title="Edit StaticPage";
			return view("cms/staticpage/edit",compact("item","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid StaticPage ID');
			return redirect("/CMS/StaticPage");
		}
	}
	public function postEdit(Request $request,$id){
		$this->validate($request, 
		[
	        'title' => 'required',
    	    'details' => 'required'
	    ],
		[
			'title.required'=>'Please enter StaticPage Title',
			'details.required'=>'Please enter StaticPage Details'
		]);		
		
		
		$staticpage = StaticPage::find($id);
		
		if ($request->file('img')!=NULL 
			&& $request->file('img')->isValid()) {
		  $destinationPath = 'uploads'; // upload path
		  // getting image extension
		  $extension = strtolower($request->file('img')->getClientOriginalExtension()); 
		  if($extension=="jpg" || $extension=="jpeg" 
		  	|| $extension=="png"){
		  $staticpage->image = uniqid().".$extension"; 
		  // renameing image
		  $request->file('img')->move($destinationPath,
		  	 $staticpage->image); 
		  // uploading file to given path
		  $this->SaveResizedImage($staticpage->image,400,"medium");
		  $this->SaveResizedImage($staticpage->image,150,"thumb");
		  $this->SaveResizedImage($staticpage->image,700,"large");
		  }
		  else{
			Session::flash('msg', "e:Please select valid Image");
			return redirect()->action('CMS\StaticPageController@getEdit',$id)
							 ->withInput(Input::all());
		  }
		}
		
		
		$staticpage->title = $request->input("title");
		$staticpage->details = $request->input("details");		
		$staticpage->active = $request->input("active")?1:0;
		$staticpage->isdelete = 0;
		$staticpage->update_admin_id = $this->adminid;
		
		
		if($staticpage->UpdateUnique($staticpage)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Page Updated Successfully');
			return redirect("/CMS/StaticPage/");
		}
		else
		{
			Session::flash('msg', "e: $staticpage->title Already exists");
			return redirect("/CMS/StaticPage/edit/$staticpage->id")->withInput();
		}
				
	}		
}