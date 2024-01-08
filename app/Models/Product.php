<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function addPictures(Request $request)
    {
        $path = $request->file('image')
            ->storeAs('public/productsImage/gallery' , $request->file('image')->getClientOriginalName());

        $this->pictures()->create([
            'path' => $path,
            'mime' => $request->file('image')->getClientMimeType()
        ]);
    }

    public function deletePicture(Picture $picture)
    {
        Storage::delete($picture->path);

        $picture->delete();
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function addDiscount(Request $request)
    {
        if (! $this->discount()->exists()) {
            $this->discount()->create([
                'value' => $request->get('value')
            ]);
        }
        else {
            $this->discount->update([
                'value' => $request->get('value')
            ]);
        }

//Tooieh bakhsheh Create, bekhatere inke mikham rooieh yek Method ye chizi emal konam, parantez gozashtam
//Toieh bakhsheh Update, bekhatere inke mikham rooieh yek record mojood toieh DataBase chizi ro update konam, parantez nazashtam
    }

    public function deleteDiscount()
    {
        $this->discount()->delete();
    }

    public function getHasDiscountAttribute()
    {
        return $this->discount()->exists();
    }

    public function getCostWithDiscountAttribute()
    {
        if (! $this->discount()->exists()) {
            return $this->cost;
        }
        else {
            return $this->cost - $this->cost * $this->discount->value / 100;
        }
    }

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public function properties()
    {
        return $this->belongsToMany(Property::class) //Many to many relation
            ->withPivot(['value']) //Add another field (For example in this code is "value" field) beside relations
            ->withTimestamps(); //Add timestamps field (created_at and updated_at)
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')
            ->withTimestamps();
    }

    public function getIsLikedAttribute()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}
