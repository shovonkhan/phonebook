<?php

namespace App\Http\Controllers;

use App\Menus;
use App\tbl_pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()

    {

        $menus =new Menus;

        try {
            $allCategories=$menus->tree();

        } catch (Exception $e) {
            //no parent category found
            echo "no parent category found";
        }

        return view('menu.index')->with('categories', $allCategories);

    }

    public function menu_get()
    {
        $categories = tbl_pages::with('children')->where('parent_id','=',0)->get();
        return view('menu.index', compact('categories'));
    }
}
