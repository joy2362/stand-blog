<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //check auth
    public function __construct(){
        $this->middleware(['auth:admin']);
    }

    public function index(){
        $category = category::all();
        return view('admin.panel.category')->with('category');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'slug' => ['required'],
            'categoryName' => ['required , unique:categories'],
        ]);

        $category = category::create([
           'name' => '$request->categoryName',
            'slug' => '$request->slug',
        ]);

        if (isset($category)){

        }
    }
}
