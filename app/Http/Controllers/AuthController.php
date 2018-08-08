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
		$user = \Socialite::driver("discord")->user();
		if(User::where("discord_id", (int)$user->id)->first()) {
			return redirect()->intended("home");
		} else {
			User::create(["discord_id" => (int)$user->id, "name" => $user->name, "email" => $user->email, "avatar_url" => $user->avatar]);
			$this->redirect()->intended("home");
		}
	}

	public function logout() {
		\Auth::logout();
		return redirect()->to("/");
	}
}
