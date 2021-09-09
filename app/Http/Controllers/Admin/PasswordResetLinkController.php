<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\Admin;
use Illuminate\Support\Str;
use DB;
use App\Notifications\AdminPasswordResetNotification; 
use Carbon\Carbon;  

class PasswordResetLinkController extends Controller
{
    
    protected $throttle = 60;
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = Admin::where('email',$request->email)->first();

        $token = Str::random(68);

        if(isset($user)){
            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
              ]);
    
              $user->notify(new AdminPasswordResetNotification($token));
    
            return back()->with('status', 'We have e-mailed your password reset link!');
        }else{
            return back()->withInput($request->only('email'))->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

    }

}
