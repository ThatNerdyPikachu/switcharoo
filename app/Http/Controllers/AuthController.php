<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
	public function redirect() {
		return \Socialite::with("discord")->redirect();
	}

	public function callback() {
		$duser = \Socialite::driver("discord")->user();
		if(User::where("discord_id", (int)$duser->id)->first()) {
			return redirect()->to("/");
		} else {
			$user = new User;
			$user->discord_id = (int)$duser->id;
			$user->name = $duser->name;
			$user->email = $duser->email;
			$user->avatar_url = $duser->avatar;
			$user->save();
			$this->redirect()->to("/");
		}
	}

	public function logout() {
		\Auth::logout();
		return redirect()->to("/");
	}
}
