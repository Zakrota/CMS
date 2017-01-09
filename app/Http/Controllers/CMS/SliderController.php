<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Slider;
use URL;

use Illuminate\Support\Facades\Input;

class SliderController extends CMSBaseController
{
	public function getIndex(Request $r)
	{
		$q=$r->input("q");		
		$items = Slider::where("title","like","%$q%")
					->where("isdelete","0")
					->orderBy('id', 'DESC')
					->paginate(10)->appends("q",$q);		
		
		$title="Manage Sliders";
		$subtitle="Sliders Section";
		return view("cms/slider/index",compact("title",
				"subtitle","items","q"));
	}
	public function getAdd()
	{
		$title="Add New Slider";
		$subtitle="Sliders Section";
		return view("cms/slider/add",compact("title","subtitle"));
	}
	
	
	public function postAdd(Request $request){
		$this->validate($request, 
		[
	        'title' => 'required'
	    ],
		[
			'title.required'=>'Please enter Slider Title'
		]);		
		
		$slider = new Slider();
		
		
		if ($request->file('img')!=NULL 
			&& $request->file('img')->isValid()) {
		  $destinationPath = 'uploads'; // upload path
		  // getting image extension
		  $extension = strtolower($request->file('img')->getClientOriginalExtension()); 
		  if($extension=="jpg" || $extension=="jpeg" || $extension=="png"){
		  $slider->image = uniqid().".$extension"; // renameing image
		  $request->file('img')->move($destinationPath, $slider->image); 
		  // uploading file to given path
		  $this->SaveResizedImage($slider->image,400,"medium");
		  $this->SaveResizedImage($slider->image,150,"thumb");
		  $this->SaveResizedImage($slider->image,700,"large");
		  }
		  else{
			Session::flash('msg', "e:Please select valid Image");
			return redirect()->action('CMS\SliderController@getAdd')
							 ->withInput(Input::all());
		  }
		}
		else {
		  // sending back with error message.
		  Session::flash('msg', 'e:You Must Select Image');
		  return  redirect()->action('CMS\SliderController@getAdd')
							->withInput(Input::all());
		}
		
		
		$slider->title = $request->input("title");
		$slider->url = $request->input("url");
		$slider->subtitle = $request->input("subtitle");
		$slider->active = $request->input("active")?1:0;
		$slider->newwindow = $request->input("newwindow")?1:0;
		$slider->isdelete = 0;
		$slider->create_admin_id = $this->adminid;
		
		if($slider->Add($slider)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Slider Added Successfully');
			return redirect("/CMS/Slider/add");
		}
		else
		{
			Session::flash('msg', "e: $slider->title Already exists");
			return redirect("/CMS/Slider/add")->withInput();
		}

	}
	
		
	public function getDelete($id){
		$slider = Slider::find($id);
		$slider->isdelete=1;
		$slider->update_admin_id = $this->adminid;
		$slider->save();
	    Session::flash('msg', 's:Slider Deleted Successfully');
		return redirect("/CMS/Slider");
	}
	
	public function getEdit($id){
		$item = Slider::find($id);
		if($item!=NULL)
		{
			$title="Edit Slider";
			return view("cms/slider/edit",compact("item","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid Slider ID');
			return redirect("/CMS/Slider");
		}
	}
	public function postEdit(Request $request,$id){
		$this->validate($request, 
		[
	        'title' => 'required'
	    ],
		[
			'title.required'=>'Please enter Slider Title'
		]);		
		
		
		$slider = Slider::find($id);
		
		if ($request->file('img')!=NULL 
			&& $request->file('img')->isValid()) {
		  $destinationPath = 'uploads'; // upload path
		  // getting image extension
		  $extension = strtolower($request->file('img')->getClientOriginalExtension()); 
		  if($extension=="jpg" || $extension=="jpeg" || $extension=="png"){
		  $slider->image = uniqid().".$extension"; // renameing image
		  $request->file('img')->move($destinationPath, $slider->image); 
		  // uploading file to given path
		  $this->SaveResizedImage($slider->image,400,"medium");
		  $this->SaveResizedImage($slider->image,150,"thumb");
		  $this->SaveResizedImage($slider->image,700,"large");
		  }
		  else{
			Session::flash('msg', "e:Please select valid Image");
			return redirect()->action('CMS\SliderController@getEdit',$id)
							 ->withInput(Input::all());
		  }
		}
				
		$slider->title = $request->input("title");
		$slider->url = $request->input("url");
		$slider->subtitle = $request->input("subtitle");
		$slider->active = $request->input("active")?1:0;
		$slider->newwindow = $request->input("newwindow")?1:0;
		$slider->update_admin_id = $this->adminid;
		
		
		if($slider->UpdateUnique($slider)>0)
		{
			//خزنا في السيشن معلومة انه تم الموضوع بنجاح
			Session::flash('msg', 's:Slider Updated Successfully');
			return redirect("/CMS/Slider/");
		}
		else
		{
			Session::flash('msg', "e: $slider->title Already exists");
			return redirect("/CMS/Slider/edit/$slider->id")->withInput();
		}
				
	}		
}