<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $primaryKey = 'idbuku';

    protected $fillable = [
        'kode',
        'judul',
        'pengarang',
        'id_kategori',
        'id_user',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
