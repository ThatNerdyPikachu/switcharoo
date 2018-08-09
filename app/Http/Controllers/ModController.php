<?php

namespace Switcharoo\Http\Controllers;

use Illuminate\Http\Request;

use Switcharoo\Game;
use Switcharoo\Mod;

class ModController extends Controller
{
    public function __construct() {
        $this->middleware("auth")->except("view");
    }

    public function new() {
    	$games = Game::all()->sortBy("name");
        return view("pages.new", ["games" => $games]);
    }

    public function create(Request $request) {
    	$this->validate($request, [
    		"name" => "required|max:256",
    		"description" => "required|max:500",
    		"file" => "required|file|mimes:zip,rar,7z",
    		"image" => "required|file|mimes:png,jpg,jpeg",
            "game" => "required"
    	]);

        Mod::create(["name" => $request->name, "description" => $request->description, "user_id" => $request->user()->id, "game_id" => $request->game, "url" => config("app.url")."/storage/".$request->file("file")->storeAs("mods", md5($request->name.$request->user()->discord_id)), "image_url" => config("app.url")."/storage/".$request->file("image")->storeAs("images", md5($request->name.$request->user()->discord_id))]);
    }

    public function view(Mod $mod) {
        return view("pages.view", ["mod" => $mod]);
    }

    public function edit(Mod $mod) {
        if (\Gate::allows("modify-mod", $mod)) {
            return view("pages.edit", ["mod" => $mod]);
        }
    }

    public function update(Request $request) {
        if (\Gate::allows("modify-mod", $mod)) {
            // TODO: Actually edit the mod
        }
    }
}
