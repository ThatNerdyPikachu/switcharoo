<?php

namespace App;

class Game extends Model
{
    public function games() {
    	return $this->hasMany("App\Game");
    }
}
