<?php

namespace App\Models;

use App\Models\School\SchoolHomework;
use App\Models\School\SchoolPurchase;
use App\Models\School\SchoolReview;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name',
        'about',
        'phone', 'phone_opened',
        'email', 'email_opened',
        'telegram', 'vk', 'skype', 'direct', 'whats_app',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all user's homeworks
     * @return HasMany
     */
    public function homeworks() {
        return $this->hasMany(SchoolHomework::class);
    }

    /**
     * Get all user's purchases
     * @return HasMany
     */
    public function purchases() {
        return $this->hasMany(SchoolPurchase::class, 'purchaser_id');
    }

    /**
     * Get all user's reviews
     * @return HasMany
     */
    public function reviews() {
        return $this->hasMany(SchoolReview::class, 'author_id');
    }

    /**
     * Get all user's avatars
     * @return HasMany
     */
    public function avatars() {
        return $this->hasMany(Avatar::class, 'author_id');
    }

    /**
     * Get all user's images
     * @return HasMany
     */
    public function images() {
        return $this->hasMany(Image::class, 'author_id');
    }

    /**
     * Get current user's Avatar
     * @return Avatar|object|null
     */
    public function avatar() {
        return $this->avatars()->orderByDesc('updated_at')->first();
    }
}
