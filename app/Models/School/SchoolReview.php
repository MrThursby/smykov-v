<?php

namespace App\Models\School;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolReview extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'author_id',
        'src', 'approved',
    ];

    /**
     * Get SchoolCourse of course_id
     * @return BelongsTo
     */
    public function course() {
        return $this->belongsTo(SchoolCourse::class, 'course_id');
    }

    /**
     * Get User of author_id
     * @return BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
