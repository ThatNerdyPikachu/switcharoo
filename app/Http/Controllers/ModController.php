<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mod;

class ModController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function new() {
    	return view("pages.new");
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		"name" => "required|max:256",
    		"description" => "required|max:512",
    		"file" => "required|file|mimes:zip,rar,7z",
    		"image" => "required|file|mimes:png,jpg,jpeg"
    	]);

    	$mod = new Mod;
        $mod->fill(["name" => $request->name, "description" => $request->description, "user_id" => \Auth::id, "game_id" => 0]);
    	$mod->url = config("app.url").'/'.str_replace("public", "storage", $request->file("file")->store("public/mods"));
    	$mod->image_url = config("app.url").'/'.str_replace("public", "storage", $request->file("image")->store("public/images"));
    	$mod->save();
    }
}
