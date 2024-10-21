<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    public function run()
    {
        // dd('UserSeeder is running');
       User::create(['nama_user' => 'admin', 'email'=> 'admin@admin.com', 'password' => Hash::make('admin123'), 'no_hp' => '0812314245', 'status_user' => '', 'id_jenis_user' => '1']);
    //    DB::table('users')->insert([
    //         'nama_user' => 'admin',
    //         'email' => 'admin@admin.com',
    //         'password' => Hash::make('admin123'),
    //         'no_hp' => '0812314245',
    //         'status_user' => '',
    //         'id_jenis_user' => '1'
    //    ]);
    }
}
