<?php

namespace App\Models\School;

use App\Models\Comment;
use App\Models\Mark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SchoolLesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section_id',
        'title', 'src', 'homework',
        'commentable', 'local_id',
        'mark',
    ];

    /**
     * Get all lesson's homeworks
     * @return HasMany
     */
    public function homeworks() {
        return $this->hasMany(SchoolHomework::class, 'lesson_id');
    }

    /**
     * Get Section of section_id
     * @return BelongsTo
     */
    public function section() {
        return $this->belongsTo(SchoolSection::class, 'section_id');
    }

    /**
     * Get all lesson's marks
     * @return MorphMany
     */
    public function marks() {
        return $this->morphMany(Mark::class, 'markable');
    }

    /**
     * Get all lesson's comments
     * @return MorphMany
     */
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
