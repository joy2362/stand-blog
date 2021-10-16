<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\setting;
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

    public function settings(){
        $name = setting::where("setting",'siteName')->first();
        $email = setting::where("setting",'email')->first();
        $phone = setting::where("setting",'phone')->first();
        $facebook = setting::where("setting",'facebook')->first();
        $twitter = setting::where("setting",'twitter')->first();
        $linkedin = setting::where("setting",'linkedin')->first();
        $youtube = setting::where("setting",'youtube')->first();
        $address = setting::where("setting",'address')->first();
        $about = setting::where("setting",'about')->first();

        return view('admin.panel.setting' , compact(with(['name', 'email','phone','facebook'
            ,'twitter','linkedin','youtube','address','about'])));
    }

    public function updateSettings(Request $request){
        $request->validate([
            'siteName' => ['required', ],
            'email' => ['required'],
            'phone' => ['required'],
            'facebook' => ['required'],
            'twitter' => ['required'],
            'linkedin' => ['required'],
            'youtube' => ['required'],
            'address' => ['required'],
            'about' => ['required'],
        ]);
        setting::where("setting",'siteName')->update([
             'option' => $request->siteName ,
            ]);
        setting::where("setting",'email')->update([
            'option' => $request->email ,
        ]);
        setting::where("setting",'phone')->update([
            'option' =>$request->phone,
        ]);
        setting::where("setting",'facebook')->update([
            'option' => $request->facebook,
        ]);
        setting::where("setting",'twitter')->update([
            'option' => $request->twitter ,
        ]);
        setting::where("setting",'linkedin')->update([
            'option' => $request->linkedin ,
        ]);
        setting::where("setting",'youtube')->update([
            'option' => $request->youtube,
        ]);
        setting::where("setting",'address')->update([
            'option' => $request->address ,
        ]);
        setting::where("setting",'about')->update([
            'option' => $request->about ,
        ]);

        $notification=array(
            'messege'=>'Site setting updated!',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }

}
