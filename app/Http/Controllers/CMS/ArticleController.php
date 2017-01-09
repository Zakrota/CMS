<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Article;
use URL;
use Illuminate\Support\Facades\Input;

class ArticleController extends CMSBaseController
{
	public function getIndex(Request $r)
	{
		$q=$r->input("q");		
		$items = Article::where("title","like","%$q%")
					->where("isdelete","0")
					->orderBy('id', 'DESC')
					->paginate(10)->appends("q",$q);		
		
		$title="Manage Articles";
		$subtitle="Articles Section";
		return view("cms/article/index",compact("title",
				"subtitle","items","q"));
	}
	public function getAdd()
	{
		$title="Add New Article";
		$subtitle="Articles Section";
		return view("cms/article/add",compact("title","subtitle"));
	}
	
	
	public function postAdd(Request $request){
		$this->validate($request, 
		[
	        'title' => 'required',
	        'date' => 'required',
    	    'details' => 'required'
	    ],
		[
			'title.required'=>'Please enter Article Title',
			'details.required'=>'Please enter Article Details'
		]);		
		
		
		
		
		
		
		
		
		
		
		$article = new Article();
		$article->title = $request->input("title");
		$article->date = $request->input("date");
		$article->details = $request->input("details");
		$article->image = $request->input("image");
		$article->active = $request->input("active")?1:0;
		$article->isdelete = 0;
		$article->create_admin_id = $this->adminid;
		
		
		if ($request->file('img')!=NULL 
			&& $request->file('img')->isValid()) {
		  $destinationPath = 'uploads'; // upload path
		  // getting image extension
		  $extension = strtolower($request->file('img')->getClientOriginalExtension()); 
		  if($extension=="jpg" || $extension=="jpeg" || $extension=="png"){
		  $article->image = uniqid().".$extension"; // renameing image
		  $request->file('img')->move($destinationPath, $article->image); 
		  // uploading file to given path
		  $this->SaveResizedImage($article->image,400,"medium");
		  $this->SaveResizedImage($article->image,150,"thumb");
		  $this->SaveResizedImage($article->image,700,"large");
		  }
		  else{
			Session::flash('msg', "e:Please select valid Image");
			return redirect()->action('CMS\ArticleController@getAdd')
							 ->withInput(Input::all());
		  }
		}
		else {
		  // sending back with error message.
		  Session::flash('msg', 'e:You Must Select Article Image');
		  return  redirect()->action('CMS\ArticleController@getAdd')
							->withInput(Input::all());
		}
		
		
		
		$article->save();
		//خزنا في السيشن معلومة انه تم الموضوع بنجاح
		Session::flash('msg', 's:Article Added Successfully');
		return redirect("/CMS/Article/add");
	}
	
		
	public function getDelete($id){
		$article = Article::find($id);
		$article->isdelete=1;
		$article->update_admin_id = $this->adminid;
		$article->save();
	    Session::flash('msg', 's:Article Deleted Successfully');
		return redirect("/CMS/Article");
	}
	
	public function getEdit($id){
		$item = Article::find($id);
		if($item!=NULL)
		{
			$title="Edit Article";
			return view("cms/article/edit",compact("item","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid Article ID');
			return redirect("/CMS/Article");
		}
	}
	public function postEdit(Request $request,$id){
		$this->validate($request, 
		[
	        'title' => 'required',
	        'date' => 'required',
    	    'details' => 'required'
	    ],
		[
			'title.required'=>'Please enter Article Title',
			'details.required'=>'Please enter Article Details'
		]);		
		
		
		$article = Article::find($id);
		
		if ($request->file('img')!=NULL 
			&& $request->file('img')->isValid()) {
		  $destinationPath = 'uploads'; // upload path
		  // getting image extension
		  $extension = strtolower($request->file('img')->getClientOriginalExtension()); 
		  if($extension=="jpg" || $extension=="jpeg" || $extension=="png"){
		  $article->image = uniqid().".$extension"; // renameing image
		  $request->file('img')->move($destinationPath, $article->image); 
		  // uploading file to given path
		  $this->SaveResizedImage($article->image,400,"medium");
		  $this->SaveResizedImage($article->image,150,"thumb");
		  $this->SaveResizedImage($article->image,700,"large");
		  }
		  else{
			Session::flash('msg', "e:Please select valid Image");
			return redirect()->action('CMS\ArticleController@getEdit',$id)
							 ->withInput(Input::all());
		  }
		}
		
		
		$article->title = $request->input("title");
		$article->details = $request->input("details");
		$article->date = $request->input("date");
		$article->active = $request->input("active")?1:0;
		$article->isdelete = 0;
		$article->update_admin_id = $this->adminid;
		$article->save();
		Session::flash('msg', 's:Article Updated Successfully');
		return redirect("/CMS/Article");
				
	}		
}