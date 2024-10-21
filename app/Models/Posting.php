<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $table = 'posting';
    protected $primaryKey = 'POSTING_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'POSTING_ID', 'SENDER', 'MESSAGE_TEXT', 'MESSAGE_GAMBAR',
        'CREATE_BY', 'CREATE_DATE', 'DELETE_MARK', 'UPDATE_BY', 'UPDATE_DATE'
    ];

    // Relasi ke tabel PostingLike
    public function likes()
    {
        return $this->hasMany(PostingLike::class, 'POSTING_ID', 'POSTING_ID');
    }

    // Relasi ke tabel PostingKomentar
    public function comments()
    {
        return $this->hasMany(PostingKomentar::class, 'POSTING_ID', 'POSTING_ID');
    }
}
