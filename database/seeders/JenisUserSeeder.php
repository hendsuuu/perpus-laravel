<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class JenisUserSeeder extends Seeder
{
    public function run()
    {
        Role::create(['jenis_user' => 'admin']);
        Role::create(['jenis_user' => 'user']);
    }
}
