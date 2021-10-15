<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\category;
use App\Models\comment;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){

        $blogs = BlogPost::latest()->skip(5)->take(6)->get();
        $sliders = BlogPost::latest()->skip(3)->take(6)->get();
        $recentPosts = BlogPost::latest()->take(4)->get();
        $category = category::all();
        $tags = BlogPost::existingTags();
        return view('frontend.index',compact(with(['category','tags','recentPosts','sliders','blogs'])));
    }

    public function details($id){
        $post = BlogPost::where('id',$id)->first();
        $recentPosts = BlogPost::latest()->take(4)->get();
        $category = category::all();
        $tags = BlogPost::existingTags();

        return view('frontend.post-details',compact(with(['post','tags','category','recentPosts'])));
    }


    public function commentCreate(Request $request , $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:5'],
        ]);

       $post =  BlogPost::find($id);
       $total_comment=  $post->total_comment +1;

        $comment = new comment();
        $comment->post_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->message;
        $comment->save();

        BlogPost::where('id',$id)->update(
          ['total_comment' => $total_comment]
        );

        return back();
    }

    public function allPost(){
        
    }
}
