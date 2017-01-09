<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
	protected $table = "slider";	
	public function Add(Slider $item)
	{
		$isExists = Slider::where("title",$item->title)->count();
		if(!$isExists)
		{
			$item->save();
			return $item->id;
		}
		else
			return -1;
	}
	
	public function UpdateUnique(Slider $item)
	{
		$isExists = Slider::where("title",$item->title)
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
