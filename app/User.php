<?php

namespace App;

class User extends Model
{
    public function mods() {
    	return $this->hasMany("App\Mod");
    }
}
