<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Support\Str;
use App\Models\Administator;
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
        Administator::create([
            'id'=> Str::uuid(),
            'name' => 'Anjasmara Dwi Setiadi',
            'email'=> 'anjasmara@gmail.com',
            'password' => bcrypt('anjasmara'),
            'no_hp'=>'081227182587',
            'date_birth'=>Carbon::create('1998', '01', '23'),
            'gender'=>'male',
            'no_ktp'=>'0863175418163',
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/99726621.jpg',
            'position'=>'administator'
        ]);

        Administator::create([
            'id'=> Str::uuid(),
            'name' => 'Ihdi Ulfaq',
            'email'=> 'ihdiulfaq@gmail.com',
            'password' => bcrypt('ihdiulfaq'),
            'no_hp'=>'081227182517',
            'date_birth'=>Carbon::create('1991', '02', '23'),
            'gender'=>'male',
            'no_ktp'=>'0863175318363',
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/99726621.jpg',
            'position'=>'administator'
        ]);
        Administator::factory(50)->create();

        
        //********* */ create user role Member
        Member::create([
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

        Member::create([
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

        Member::factory(50)->create();
    }
}
