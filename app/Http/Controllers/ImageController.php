<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    public function upload(ImageRequest $requset)
    {
    	// return $requset->all();
    	// if ($requset->hasFile('image')) {
    	// 	$filename = $requset->image->getClientOriginalName();
    	// 	$requset->image->move('images',$filename);
    	// }

    	// $requset->user()->avatar = $filename;
    	$requset->user()->avatar = $requset->image;
    	$requset->user()->save();
    	// return back();
    	return response(null, 200);
    }
}
