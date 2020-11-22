<?php

namespace App\Models\School;

use App\Models\Comment;
use App\Models\Mark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SchoolCourse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug',
        'preview_src', 'description',
        'use_fork', 'commentable',
        'single_price', 'mark'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * Get all course's forks
     * @return HasMany
     */
    public function forks() {
        return $this->hasMany(SchoolFork::class, 'course_id');
    }

    /**
     * Get all course's reviews
     * @return HasMany
     */
    public function reviews() {
        return $this->hasMany(SchoolReview::class, 'course_id');
    }

    /**
     * Get all course's purchases
     * @return HasMany
     */
    public function purchases() {
        return $this->hasMany(SchoolPurchase::class, 'course_id');
    }

    /**
     * Get all course's sections
     * @return HasMany
     */
    public function sections() {
        return $this->hasMany(SchoolSection::class, 'course_id');
    }

    /**
     * Get all course's marks
     * @return MorphMany
     */
    public function marks() {
        return $this->morphMany(Mark::class, 'markable');
    }

    /**
     * Get all course's comments
     * @return MorphMany
     */
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getTitleAttribute($title) {
        return ucfirst($title);
    }

    public function getUseForkAttribute($use_fork){
        return (boolean) $use_fork;
    }

    /**
     * @param int $user_id
     * @return bool
     */
    public function purchasedBy($user_id) {
        $purchase = $this->purchases()->wherePurchaserId($user_id)->first();
        return !!$purchase;
    }
}
