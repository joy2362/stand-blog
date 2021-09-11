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

        return view('admin.panel.category',compact('category'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:55|min:3',
            'slug' => 'required'
        ]);


        $category = category::create([
           'name' => $request->name,
            'slug' => $request->slug,
        ]);

        if (isset($category)){
            $notification=array(
                'messege'=>'Category Saved Successfully!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something wrong please try again!',
                'alert-type'=>'error'
            );
        }
        return Redirect('/admin/category')->with($notification);
    }

    public function destroy($id){

        $category = category::destroy($id);
        if (isset($category)){
            $notification=array(
                'messege'=>'Category Deleted Successfully!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something wrong please try again!',
                'alert-type'=>'error'
            );
        }
        return Redirect()->back()->with($notification);
    }

    public function edit ($id){
        $category = category::where('id',$id)->first();
        return view('admin.panel.editCategory',compact('category'));
    }

    public function create(){
        return view('admin.panel.addCategory');
    }

    public function  update(Request $request ,  $id){
        $validatedData = $request->validate([
            'name' => 'required |max:55|min:3',
            'slug' => 'required'
        ]);
     
        $category  = category::where('id' , $id )->first();
        $category->name =  $request->name;
        $category->slug = $request->slug;
        $category->save();

        if (isset($category)){
            $notification=array(
                'messege'=>'Category Update Successfully!',
                'alert-type'=>'success'
            );
        }else{
            $notification=array(
                'messege'=>'Something wrong please try again!',
                'alert-type'=>'error'
            );
        }
        return Redirect('/admin/category')->with($notification);
    }
}
