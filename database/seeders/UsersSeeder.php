<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $user = User::create([
            'first_name'=>'Learning Tiger',
            'last_name'=>'Admin',
            'email'=>'admin@dstudio.asia',
            'password'=>Hash::make('456258'),
        ]);
        $user->roles()->attach(Role::where('slug', 'admin')->first());

        
        $user = User::create([
            'first_name'=>'Rashed Kaysar',
            'last_name'=>'Rasel',
            'email'=>'rashedkatsar321@gmail.com',
            'password'=>Hash::make('456258'),
        ]);
        $user->roles()->attach(Role::where('slug', 'user')->first());
    }
}
