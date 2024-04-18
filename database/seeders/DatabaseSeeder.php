<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\AdminMember;
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
        //********* */ create user role Administator
        AdminMember::create([
            'id'=> Str::uuid(),
            'name' => 'Anjasmara Dwi Setiadi',
            'email'=> 'anjasmara@gmail.com',
            'password' => bcrypt('anjasmara'),
            'no_hp'=>'081227182587',
            'date_birth'=>Carbon::create('1998', '01', '23'),
            'gender'=>'male',
            'no_ktp'=>'0863175418163',
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/99726621.jpg',
            'position'=>'administator',
            'status'=> true,
        ]);

        AdminMember::create([
            'id'=> Str::uuid(),
            'name' => 'Ihdi Ulfaq',
            'email'=> 'ihdiulfaq@gmail.com',
            'password' => bcrypt('ihdiulfaq'),
            'no_hp'=>'081227182517',
            'date_birth'=>Carbon::create('1991', '02', '23'),
            'gender'=>'male',
            'no_ktp'=>'0863175318363',
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/99726621.jpg',
            'position'=>'administator',
            'status'=> false,
        ]);
        //********* */ create user role Member
        AdminMember::create([
            'id'=> Str::uuid(),
            'name' => 'Mylalovic Frederich',
            'email'=> 'mylalovic@gmail.com',
            'password' => bcrypt('mylalovic'),
            'no_hp'=>'081227182582',
            'date_birth'=>Carbon::create('1997', '04', '12'),
            'gender'=>'female',
            'no_ktp'=>'0863175318163',
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/6983839.jpg',
            'position'=>'member',
            'status'=> true,
        ]);

        AdminMember::create([
            'id'=> Str::uuid(),
            'name' => 'Santiago Lozano',
            'email'=> 'santiagolozano@gmail.com',
            'password' => bcrypt('santiagolozano'),
            'no_hp'=>'081224282582',
            'date_birth'=>Carbon::create('1991', '04', '12'),
            'gender'=>'female',
            'no_ktp'=>'0863179618163',
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/6983839.jpg',
            'position'=>'member',
            'status'=> false,
        ]);
        AdminMember::factory(50)->create();
    }
}
