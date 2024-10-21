<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingKomentar extends Model
{
    use HasFactory;

    protected $table = 'posting_komentar';
    protected $primaryKey = 'KOMEN_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'KOMEN_ID', 'POSTING_ID', 'USER_ID', 'KOMENTAR_TEXT', 'KOMENTAR_GAMBAR',
        'CREATE_BY', 'CREATE_DATE', 'DELETE_MARK', 'UPDATE_BY', 'UPDATE_DATE'
    ];

    // Relasi ke tabel Posting
    public function posting()
    {
        return $this->belongsTo(Posting::class, 'POSTING_ID', 'POSTING_ID');
    }
}
