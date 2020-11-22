<?php

namespace App\Models\School;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolHomework extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lesson_id', 'author_id',
        'content', 'response',
        'mark', 'allow_next',
    ];

    /**
     * Get SchoolLesson from lesson_id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson() {
        return $this->belongsTo(SchoolLesson::class, 'lesson_id');
    }
    /**
     * Get SchoolLesson from lesson_id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
