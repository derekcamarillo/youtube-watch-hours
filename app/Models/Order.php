<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'link', 'title', 'quantity', 'seconds', 'daily_limit', 'gender', 'country'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uid = Str::random(16);
        });
    }

    public function visitors() {
        return $this->belongsToMany(User::class, "user_order");
    }

    public function getRemainsAttribute() {
        return $this->attributes['quantity'] - $this->visitors()->count();
    }

    public function getVideoAttribute() {
        $link = $this->attributes['link'];

        if (Str::contains($link, "watch?v=")) {
            $array = explode("watch?v=", $link);
            return $array[1];
        } elseif (Str::contains($link, "embed")) {
            $array = explode('/', $link);
            return $array[sizeof($array) - 1];
        } else {
            return null;
        }
    }
}
