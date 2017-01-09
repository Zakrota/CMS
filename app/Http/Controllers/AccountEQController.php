<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//للتواصل مع القاعدة
use DB;
use Session;
use App\Account;
use App\Country;
use URL;

class AccountEQController extends Controller
{
	public function getIndex(){
		//$Account = new Account();
		$accounts = Account::all();		
		//$accounts = $Account->all();
		/*$accounts = Account::where("active","1")
					//->orWhere("gender","F")
					->where("countryid","!=","1")
					->get();*/
		$title="Manage Accounts";
		return view("AccountEQ/index",compact("accounts","title"));
	}
	
	public function getPagination(){
		$accounts = Account::paginate(5);
		//$accounts = Account::simplePaginate(5);
		$title="Accounts Pagination";
		return view("AccountEQ/pagination",compact("accounts","title"));
	}
	public function getSearch(Request $r){
		$q=$r->input("q");		
		$accounts = Account::where("fullname","like","%$q%")
					->get();
		$title="Search Accounts";
		return view("AccountEQ/search",compact("accounts","title","q"));
	}
	public function getSearchpagination(Request $r){
		$q=$r->input("q");		
		$accounts = Account::where("fullname","like","%$q%")
					->paginate(5)->appends("q",$q);
		$title="Search Accounts & Paginations";
		return view("AccountEQ/searchpagination",compact("accounts","title","q"));
	}
	
	public function getAdd(){
		//$countries = DB::table('country')->get();
		$countries = Country::all();
		$title="Add New Account";
		return view("AccountEQ/add",compact("countries","title"));
	}	
	
	public function postAdd(Request $request){
		$this->validate($request, 
		[
	        'fullname' => 'required',
    	    'email' => 'required|email',
			'country'=>'required',
			'gender'=>'required'
	    ],
		[
			'fullname.required'=>'Please enter your Full Name',
			'email.email'=> 'Please enter valid email address',
			'gender.required'=>'Please select your Gender'
		]);
		
		
		
		/*DB::table('account')->insert(
			[
				'email' => $request->input("email"),
				'fullname' => $request->input("fullname"),
				'gender' => $request->input("gender"),
				'countryid' => $request->input("country"),
				'active' => $request->input("active")?1:0
			]
		);*/
		$account = new Account();
		$account->email = $request->input("email");
		$account->fullname = $request->input("fullname");
		$account->gender = $request->input("gender");
		$account->countryid = $request->input("country");
		$account->active = $request->input("active");
		$account->save();
		//خزنا في السيشن معلومة انه تم الموضوع بنجاح
		Session::flash('msg', 's:Account Added Successfully');
		return redirect("/AccountEQ/add");
	}
	
	public function getEdit($id){
		//$account = DB::table('account')->where("id",$id)->first();
		//$account = DB::table('account')->find($id);
		$account = Account::find($id);
		if($account!=NULL)
		{
			$title="Edit Account";
			$countries = DB::table('country')->get();
			return view("AccountEQ/edit",compact("account","countries","title"));
		}
		else
		{
			Session::flash('msg', 'e:Invalid Account ID');
			return redirect("/AccountEQ");
		}
	}
	public function postEdit(Request $request,$id){
		$this->validate($request, 
		[
	        'fullname' => 'required',
    	    'email' => 'required|email',
			'country'=>'required',
			'gender'=>'required'
	    ],
		[
			'fullname.required'=>'Please enter your Full Name',
			'gender.required'=>'Please select your Gender'
		]);
		
		/*DB::table('account')
		->where('id', $id)
		->update(
		[
			'email' => $request->input("email"),
			'fullname' => $request->input("fullname"),
			'gender' => $request->input("gender"),
			'countryid' => $request->input("country"),
			'active' => $request->input("active")?1:0
		]);*/
		$account = Account::find($id);
		$account->email = $request->input("email");
		$account->fullname = $request->input("fullname");
		$account->gender = $request->input("gender");
		$account->countryid = $request->input("country");
		$account->active = $request->input("active");
		$account->save();
		Session::flash('msg', 's:Account Updated Successfully');
		return redirect("/AccountEQ");
				
	}		
	public function getDelete($id){
		//DB::table('account')->where("id",$id)->first();
		$account = Account::find($id);
		$account->delete();
	    Session::flash('msg', 's:Account Deleted Successfully');
		return redirect("/AccountEQ");
	}
}
