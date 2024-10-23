<?php

namespace Database\Seeders;

use App\Models\MenuLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MenuLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuLevel::create(['level' => 'admin']);
        MenuLevel::create(['level' => 'user']);
    }
}
