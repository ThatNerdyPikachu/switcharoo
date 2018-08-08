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

    	$mod = new Mod;
        $mod->fill(["name" => $request->name, "description" => $request->description, "user_id" => $request->user()->id, "game_id" => $request->game]);
    	$mod->url = config("app.url").'/'.str_replace("public", "storage", $request->file("file")->store("public/mods"));
    	$mod->image_url = config("app.url").'/'.str_replace("public", "storage", $request->file("image")->store("public/images"));
    	$mod->save();
    }

    public function view(Mod $mod) {
        return view("pages.view", ["mod" => $mod]);
    }
}
