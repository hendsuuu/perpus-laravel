<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        Menu::create(['name' => 'Dashboard', 'url' => '/dashboard', 'icon' => 'dashboard-icon']);
        Menu::create(['name' => 'Users', 'url' => '/users', 'icon' => 'users-icon']);
        Menu::create(['name' => 'Settings', 'url' => '/settings', 'icon' => 'settings-icon']);
    }
}
