<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'full_name',
        'refral_name',
        'cnic',
        'status',
        'father_name',
        'email',
        'plan_id',
        'x_wallet',
        'online_store_wallet',
        'total_earning',
        'enjoy_store_discount',
        'register_points',
        'refral_side',
        'rank',
        'profile_photo_path',
        'refral_id',
        'bv_left',
        'active_phone',
        'bv_right',
        'left_refral_side',
        'right_refral_side',
        'future_points',
        'password',
        'string_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function userKyc()
    {
        return $this->hasOne(UserKyc::class);
    }
    public function referral(){
        return $this->belongsTo(User::class, 'refral_id');
    }
    public function package(){
        return $this->belongsTo(packages::class, 'plan_id');
    }
    public function left(){
        return $this->belongsTo(User::class, 'left_refral_side');
    }
    public function right(){
        return $this->belongsTo(User::class, 'right_refral_side');
    }
    
 
    
}
