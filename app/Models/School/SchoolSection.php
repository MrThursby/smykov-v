<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'fork_id', 'title'
    ];

    /**
     * Get SchoolCourse from course_id
     * @return BelongsTo
     */
    public function course() {
        return $this->belongsTo(SchoolCourse::class, 'course_id');
    }

    /**
     * Get SchoolFork from fork_id
     * @return BelongsTo
     */
    public function fork() {
        return $this->belongsTo(SchoolFork::class, 'fork_id');
    }

    public function lessons() {
        return $this->hasMany(SchoolLesson::class, 'section_id');
    }

    public function getTitleAttribute($title) {
        return ucfirst($title);
    }
}
