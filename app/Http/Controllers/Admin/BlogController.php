<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogDetailsImage;
use App\Models\BlogPost;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    //check auth
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {
        $blog = BlogPost::all();
        return view('admin.panel.blog', compact('blog'));
    }

    public function create(){
        $category = category::all();
        return view ('admin.panel.addBlog',compact('category'));
    }

    public function store(Request  $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:blog_posts',
            'category' => 'required',
            'tags' => 'required',
            'poster' => 'required |image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $poster = $request->poster;

        $poster_name='media/'.Str::random(10).'.'.Str::lower($poster->getClientOriginalExtension());
        Image::make($poster)->save($poster_name);

        $tags = explode(", ", $request['tags']);

        $blog = new BlogPost();
        $blog ->title = $request->title;
        $blog ->post_by = $user_id;
        $blog ->category = $request->category;
        $blog ->tags = $request->tags;
        $blog ->poster = $poster_name;
        $blog->save();

        $blog->tag($tags);
        $notification=array(
            'messege'=>'Post added!',
            'alert-type'=>'success'
        );

        return view ('admin.panel.addBlogDescription',compact('blog'))->with($notification);

    }

    public function addDetails($id){
        $blog = BlogPost::where('id',$id)->first();
        if (isset($blog)){
            return view('admin.panel.addBlogDescription',compact('blog'));
        }else{
            $notification=array(
                'messege'=>'Something wrong try again!',
                'alert-type'=>'error'
            );
            return redirect('/admin/blog')->with($notification);
        }
    }

    public function storeDetails(Request $request,$id){
        $validatedData = $request->validate([
            'details' => 'required',
        ]);
        $details = $request->details;

        $dom = new \DomDocument();

        $dom->loadHtml($details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/media/details/img" . Str::random(10).$k.'.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $imgDetails = new BlogDetailsImage();
            $imgDetails->post_id =$id;
            $imgDetails->img = $image_name;
            $imgDetails->save();

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $details = $dom->saveHTML();
        $blog = BlogPost::where('id',$id)->first();
        $blog ->details = $details;
        $blog->is_active = 1;
        $blog ->save();
        $notification=array(
            'messege'=>'Post Details added!',
            'alert-type'=>'success'
        );
        return redirect('/admin/blog')->with($notification);
    }

    public function destroy($id){
        $blog = BlogPost::where("id",$id)->first();

        $blog->untag();
        unlink($blog->poster);
        if ($blog->is_active){
           $details = BlogDetailsImage::where('post_id',$id)->get();
           foreach($details as $row){
               unlink( public_path() .$row->img);
           }
            $details = BlogDetailsImage::where('post_id',$id)->delete();
        }

        $blog->delete();
        $notification=array(
            'messege'=>'Post Deleted!',
            'alert-type'=>'success'
        );
        return redirect('/admin/blog')->with($notification);
    }
}
