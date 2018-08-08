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

    public function store(Request $request) {
    	$this->validate($request, [
    		"name" => "required|max:256",
    		"description" => "required|max:500",
    		"file" => "required|file|mimes:zip,rar,7z",
    		"image" => "required|file|mimes:png",
            "game" => "required"
    	]);

        Mod::create(["name" => $request->name, "description" => $request->description, "user_id" => $request->user()->id, "game_id" => $request->game, "url" => config("app.url")."/storage/".$request->file("file")->store("mods"), "image_url" => config("app.url")."/storage/".$request->file("image")->store("images")]);
    }

    public function view(Mod $mod) {
        return view("pages.view", ["mod" => $mod]);
    }
}
