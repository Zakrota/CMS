<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
	protected $table = "menu";	
	public function Add(Menu $item)
	{
		$isExists = Menu::where("title",$item->title)
		->where("parent_id",$item->parent_id)->count();
		if(!$isExists)
		{
			$item->save();
			return $item->id;
		}
		else
			return -1;
	}
	
	public function UpdateUnique(Menu $item)
	{
		$isExists = Menu::where("title",$item->title)
		->where("parent_id",$item->parent_id)
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
