<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    //
	protected $table = "static_page";	
	public function Add(StaticPage $item)
	{
		$isExists = StaticPage::where("title",$item->title)->count();
		if(!$isExists)
		{
			$item->save();
			return $item->id;
		}
		else
			return -1;
	}
	
	public function UpdateUnique(StaticPage $item)
	{
		$isExists = StaticPage::where("title",$item->title)
		->where("id","!=",$item->id)->count();
		if(!$isExists)
		{
			$item->save();
			return $item->id;
		}
		else
			return -1;
	}
}
