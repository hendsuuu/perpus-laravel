<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingLike extends Model
{
    use HasFactory;

    protected $table = 'posting_like';
    protected $primaryKey = 'LIKE_ID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'LIKE_ID', 'POSTING_ID', 'USER_ID', 'CREATE_DATE',
        'DELETE_MARK', 'UPDATE_BY', 'UPDATE_DATE'
    ];

    // Relasi ke tabel Posting
    public function posting()
    {
        return $this->belongsTo(Posting::class, 'POSTING_ID', 'POSTING_ID');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'USER_ID');
    }
}
