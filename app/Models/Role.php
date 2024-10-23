<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'jenis_user';

    protected $primaryKey = 'id_jenis_user';

    protected $fillable = [
        'jenis_user',
    ];

    public function roles()
    {
        return $this->hasMany(User::class, 'id_jenis_user');
    }

    public function menus()
    {
            return $this->belongsToMany(Menu::class, 'role_menu');
    }
    public function likes()
    {
        return $this->hasMany(PostingLike::class);
    }
}
