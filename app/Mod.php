<?php

namespace App;

class Mod extends Model
{
    public function author() {
    	return $this->belongsTo("App\User");
    }

    public function game() {
    	return $this->belongsTo("App\Game");
    }
}
