<?php

namespace Database\Seeders;

use App\Models\AdminPermission;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin  = new Admin();
        $admin->name = 'Adbullah zahid';
        $admin->email = 'abdullahzahidjoy@gmail.com';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('1234');
        $admin->save();

        $permission = new AdminPermission();
        $permission->name = $admin->id;
        $permission->category = 1 ;
        $permission->admin = 1 ;
        $permission->save();
    }
}
