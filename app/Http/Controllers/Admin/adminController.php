<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class adminController extends Controller
{
    //check auth
    public function __construct(){
        $this->middleware(['auth:admin']);
    }

    public function index(){
        $admin = Admin::all();
        return view('admin.panel.allAdmin',compact('admin'));
    }

    public function create(){
        return view('admin.panel.addAdmin');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request  $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->id;

       $permission = new AdminPermission();
       $permission->name = $user;
       if ($request->has('category')){
           $permission->category = $request->category ;
       }
        if ($request->has('admin')){
            $permission->admin = $request->admin ;
        }
        $permission->save();

        $notification=array(
            'messege'=>'Admin Saved Successfully!',
            'alert-type'=>'success'
        );
        return Redirect('/admin/access/all')->with($notification);
    }

    public function destroy($id){
        if (Auth::guard('admin')->user()->id != $id){
            AdminPermission::where('name',$id)->delete();
            Admin::destroy($id);
        }else{
            $notification=array(
                'messege'=>'Admin Delete Failed!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }



        $notification=array(
            'messege'=>'Admin Delete Successfully!',
            'alert-type'=>'success'
        );
        return Redirect('/admin/access/all')->with($notification);
    }
}
