<?php

namespace App\Models\Blog;

use App\Models\Comment;
use App\Models\Mark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laratrust\Contracts\Ownable;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'content', 'excerpt',
        'mark',
        'commentable'
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
     * Get all post's marks
     * @return MorphMany
     */
    public function marks() {
        return $this->morphMany(Mark::class, 'markable');
    }

    /**
     * Get all post's comments
     * @return MorphMany
     */
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
