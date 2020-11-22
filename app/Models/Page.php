<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content',
        'commentable', 'mark'
    ];

    /**
     * Get all page's marks
     * @return MorphMany
     */
    public function marks() {
        return $this->morphMany(Mark::class, 'markable');
    }

    /**
     * Get all page's comments
     * @return MorphMany
     */
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
