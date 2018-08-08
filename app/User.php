<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function mods() {
    	return $this->hasMany("App\Mod");
    }
}
