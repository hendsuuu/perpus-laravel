<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'menu_name',
        'menu_link',
        'menu_icon',
        'id_level',
    ];

    public function menuLevel()
    {
        return $this->hasMany(MenuLevel::class, 'id_level');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_menu');
    }

    public function getAccessibleMenus($roleId)
    {
        // Ambil semua menu yang tersedia untuk role tertentu
        $menus = Menu::whereHas('menuLevel', function ($query) use ($roleId) {
            $query->where('role_id', $roleId);
        })->with('children')->orderBy('order', 'asc')->get();

        return $menus;
    }
}
