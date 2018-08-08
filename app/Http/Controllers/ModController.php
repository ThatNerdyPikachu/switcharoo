<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mod;

class ModController extends Controller
{
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
    	$mod->name = $request->name;
    	$mod->description = $request->description;
    	$mod->url = config("app.url").'/'.str_replace("public", "storage", $request->file("file")->store("public/mods"));
    	$mod->image_url = config("app.url").'/'.str_replace("public", "storage", $request->file("image")->store("public/images"));
    	// placeholders
    	$mod->user_id = 0;
    	$mod->game_id = 0;
    	$mod->save();
    }
}
