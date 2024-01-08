<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\otpMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function getRouteKeyName()
//    {
//        return 'username';
//    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Product::class, 'likes')
            ->withTimestamps();
    }

    public function like(Product $product)
    {
        $isLikedBefore = $this->likes()->where('id', $product->id)->exists();

        if ($isLikedBefore) {
            return $this->likes()->detach($product);
        }

        return $this->likes()->attach($product);
    }

}
