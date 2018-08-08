<?php

namespace Switcharoo;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function games() {
    	return $this->hasMany("Switcharoo\Game");
    }
}
