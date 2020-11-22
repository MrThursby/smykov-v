<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'parent_id',
        'commentable_id', 'commentable_type',
        'mark', 'content'
    ];

    public function commentable() {
        return $this->morphTo();
    }

    /**
     * Get all comment's marks
     * @return MorphMany
     */
    public function marks() {
        return $this->morphMany(Mark::class, 'markable');
    }

    /**
     * Get all comment's child comments
     * @return MorphMany
     */
    public function children() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
