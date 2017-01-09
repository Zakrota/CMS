<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
	protected $table = "account";
	public function Country()
    {
        return $this->belongsTo('App\Country',"countryid");
    }
}
