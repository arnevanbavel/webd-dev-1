<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    
   	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}