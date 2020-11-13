<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'link', 'quantity', 'seconds'
    ];

    public function users() {
        return $this->belongsToMany(User::class, "user_order");
    }

    public function getRemainsAttribute() {
        return $this->attributes['quantity'] - $this->users()->count();
    }

    public function getVideoAttribute() {
        $link = $this->attributes['link'];

        if (Str::contains($link, "watch?v=")) {
            $array = explode("watch?v=", $link);
            return $array[0];
        } elseif (Str::contains($link, "embed")) {
            $array = explode('/', $link);
            return $array[sizeof($array) - 1];
        } else {
            return null;
        }
    }
}
