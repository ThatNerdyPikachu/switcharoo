<?php

namespace Switcharoo\Http\Controllers;

use Illuminate\Http\Request;

use Switcharoo\User;

class AuthController extends Controller
{
	public function redirect() {
		return \Socialite::with("discord")->redirect();
	}

	public function callback() {
		$user = \Socialite::driver("discord")->user();
		$u = User::where("discord_id", (int)$user->id)->first();
		if($u) {
			\Auth::login($u, true);
			return redirect()->to(route("home"));
		} else {
			$u = User::create(["discord_id" => (int)$user->id, "name" => $user->name, "email" => $user->email, "avatar_url" => $user->avatar]);
			\Auth::login($u, true);
			return redirect()->to(route("home"));
		}
	}

	public function logout() {
		\Auth::logout();
		return redirect()->to("/");
	}
}
