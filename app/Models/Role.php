<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions()
            ->where('title' , $permission)
            ->exists();
    }

    public static function findByTitle($title)
    {
        return self::query()->whereTitle($title)->firstOrFail();
    }
}
