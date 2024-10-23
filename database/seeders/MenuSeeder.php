<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        Menu::create(['menu_name' => 'Dashboard', 'menu_link' => '/dashboard', 'menu_icon' => 'dashboard-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Dashboard', 'menu_link' => '/dashboard', 'menu_icon' => 'dashboard-icon', 'id_level' => 2]);
        Menu::create(['menu_name' => 'Master User', 'menu_link' => '/user', 'menu_icon' => 'users-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Master Jenis Role', 'menu_link' => '/role', 'menu_icon' => 'users-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Master Menu', 'menu_link' => '/menu', 'menu_icon' => 'users-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Daftar Buku', 'menu_link' => '/buku', 'menu_icon' => 'settings-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Daftar Buku User', 'menu_link' => '/buku', 'menu_icon' => 'settings-icon', 'id_level' => 2]);
        Menu::create(['menu_name' => 'Kategori Buku', 'menu_link' => '/kategori', 'menu_icon' => 'settings-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Manajemen Posting', 'menu_link' => '/posting', 'menu_icon' => 'settings-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Manajemen Posting', 'menu_link' => '/posting', 'menu_icon' => 'settings-icon', 'id_level' => 2]);
        Menu::create(['menu_name' => 'Like', 'menu_link' => '/like', 'menu_icon' => 'settings-icon', 'id_level' => 1]);
        Menu::create(['menu_name' => 'Komen', 'menu_link' => '/komen', 'menu_icon' => 'settings-icon', 'id_level' => 1]);
    }
}
