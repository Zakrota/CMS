<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Slider;
use App\StaticPage;
use App\Article;
use URL;

class FrontEndController extends FrontEndBaseController
{
	public function getIndex(){
		$sliders = Slider::where("isdelete",0)->where("active",1)
		->paginate(5);
		$articles = Article::where("isdelete",0)->where("active",1)
		->paginate(6);
		$title="Home Page";
		return view("FrontEnd/index",compact("sliders"
			,"title","articles"));
	}
	public function getContact(){
		
		$title="Contact Us";
		return view("FrontEnd/contact",compact("title"));
	}
	public function getArticle($id){
		$article = Article::where("isdelete",0)->where("active",1)
		->where("id",$id)->get();
		if($article->count()==0)
		{
			Session::flash('msg', 'e:Invalid Page URL');
			return redirect("/");
		}
		$title=$article[0]->title;
		$articles = Article::where("isdelete",0)->where("active",1)
		->where("id","<>",$id)->paginate(4);
		return view("FrontEnd/article",compact("article","articles"));
	}
	
	public function getPage($id){
		$page = StaticPage::where("isdelete",0)->where("active",1)
		->where("id",$id)->get();
		if($page->count()==0)
		{
			Session::flash('msg', 'e:Invalid Page URL');
			return redirect("/");
		}
		$title=$page[0]->title;
		return view("FrontEnd/page",compact("page"));
	}
}
