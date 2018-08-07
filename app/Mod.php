<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    public function author() {
    	return $this->belongsTo("App\User", "author_id");
    }

    public function game() {
    	return $this->belongsTo("App\Game");
    }
}
