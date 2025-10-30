<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Izinkan 'content' dan 'user_id' untuk diisi secara massal
    protected $fillable = [
        'user_id',
        'content',
    ];

    /**
     * Relasi: Sebuah Post dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Siapa saja User yang me-like Post ini.
     * (Relasi M-N dengan User melalui tabel 'likes')
     */
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
}
