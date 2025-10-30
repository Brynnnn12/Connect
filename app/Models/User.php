<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Relasi: Seorang User memiliki banyak Post.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relasi: Postingan apa saja yang di-like oleh User ini.
     * (Relasi M-N dengan Post melalui tabel 'likes')
     */
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }

    /**
     * Relasi: Siapa saja yang di-follow oleh User ini.
     */
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_user_id', 'following_user_id');
    }

    /**
     * Relasi: Siapa saja yang me-follow User ini.
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_user_id', 'follower_user_id');
    }
}
