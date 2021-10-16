<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting::create([
           'setting' => 'siteName',
            'option' => 'Simplae Blog'
        ]);
        setting::create([
            'setting' => 'email' ,
            'option' => 'abdullahzahidjoy@gmail.com'
        ]);
        setting::create([
            'setting' => 'phone' ,
            'option' => '01780134797'
        ]);
        setting::create([
            'setting' => 'facebook',
            'option' => 'https://www.facebook.com/azahidjoy'
        ]);
        setting::create([
            'setting' => 'twitter',
            'option' => 'https://twitter.com/home'
        ]);
        setting::create([
            'setting' => 'linkedin',
            'option' => 'https://www.linkedin.com/in/abdullah-zahid-6615871ba/'
        ]);
        setting::create([
            'setting' => 'youtube',
            'option' => 'https://www.youtube.com/'
        ]);

        setting::create([
            'setting' => 'address',
            'option' => 'dhaka'
        ]);
        setting::create([
            'setting' => 'about' ,
            'option' => 'its simple blog site'
        ]);
    }
}
