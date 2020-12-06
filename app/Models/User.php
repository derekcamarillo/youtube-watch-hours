<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'country',
        'subscribed',
        'ref_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'spin_at' => 'datetime'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $attributes = [

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->ref_code = Str::random();
        });
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function watches() {
        return $this->belongsToMany(Order::class, "user_order");
    }

    public function withdrawals() {
        return $this->hasMany(Withdrawal::class);
    }

    public function lotteries() {
        return $this->hasMany(Lottery::class);
    }

    public function win_lotteries() {
        return $this->hasMany(Lottery::class)->where('winner', true)->withTrashed();
    }

    public function getRefUserAttribute() {
        try {
            $refUser = User::findOrFail($this->attributes['ref_user']);

            return $refUser;
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}
