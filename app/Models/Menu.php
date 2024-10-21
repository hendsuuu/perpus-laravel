<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu_level';

    protected $primaryKey = 'id_level';

    protected $fillable = [
        'level',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_level');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_menu');
    }
}
