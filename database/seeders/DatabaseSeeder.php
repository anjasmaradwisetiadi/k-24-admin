<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //********* */ create user role 
        Role::create([
            'name'=>'administator',
            'permisions'=> json_encode(array(
                '0'=>'full view administator',
                '1'=>'full view member',
                '2'=>'crud member',
            ))
        ]);

        Role::create([
            'name'=>'member',
            'permisions'=> json_encode(array(
                '0'=>'separate view member',
            ))
        ]);

        //********* */ create user 
        User::create([
            'id'=> Str::uuid(),
            'role_id'=> '1',
            'name' => 'Anjasmara Dwi Setiadi',
            'email'=> 'anjasmara@gmail.com',
            'password' => bcrypt('anjasmara'),
            'no_hp'=>'081227182587',
            'date_birth'=>Carbon::create('1998', '01', '23'),
            'gender'=>'male',
            'no_ktp'=>'0863175418163',
            'photo'=>'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg',
            'position'=>'administator',
            'status'=> true,
        ]);

        User::create([
            'id'=> Str::uuid(),
            'role_id'=> '1',
            'name' => 'Ihdi Ulfaq',
            'email'=> 'ihdiulfaq@gmail.com',
            'password' => bcrypt('ihdiulfaq'),
            'no_hp'=>'081227182517',
            'date_birth'=>Carbon::create('1991', '02', '23'),
            'gender'=>'male',
            'no_ktp'=>'0863175318363',
            'photo'=>'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg',
            'position'=>'administator',
            'status'=> false,
        ]);
        //********* */ create user role Member
        User::create([
            'id'=> Str::uuid(),
            'role_id'=> '2',
            'name' => 'Mylalovic Frederich',
            'email'=> 'mylalovic@gmail.com',
            'password' => bcrypt('mylalovic'),
            'no_hp'=>'081227182582',
            'date_birth'=>Carbon::create('1997', '04', '12'),
            'gender'=>'female',
            'no_ktp'=>'0863175318163',
            'photo'=>'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg',
            'position'=>'member',
            'status'=> true,
        ]);

        User::create([
            'id'=> Str::uuid(),
            'role_id'=> '2',
            'name' => 'Santiago Lozano',
            'email'=> 'santiagolozano@gmail.com',
            'password' => bcrypt('santiagolozano'),
            'no_hp'=>'081224282582',
            'date_birth'=>Carbon::create('1991', '04', '12'),
            'gender'=>'female',
            'no_ktp'=>'0863179618163',
            'photo'=>'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg',
            'position'=>'member',
            'status'=> false,
        ]);

        User::factory(50)->create();
    }
}
