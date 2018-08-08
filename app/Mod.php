<?php

namespace Switcharoo;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{

	protected $guarded = [];

    public function user() {
    	return $this->belongsTo("Switcharoo\User");
    }

    public function game() {
    	return $this->belongsTo("Switcharoo\Game");
    }
}
