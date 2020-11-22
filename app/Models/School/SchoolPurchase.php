<?php

namespace App\Models\School;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolPurchase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchaser_id', 'fork_id', 'course_id'
    ];

    /**
     * Get User from purchaser_id
     * @return BelongsTo
     */
    public function purchaser() {
        return $this->belongsTo(User::class, 'purchaser_id');
    }

    /**
     * Get SchoolFork from fork_id
     * @return BelongsTo
     */
    public function fork() {
        return $this->belongsTo(SchoolFork::class, 'fork_id');
    }

    /**
     * Get SchoolCourse from course_id
     * @return BelongsTo
     */
    public function course() {
        return $this->belongsTo(SchoolCourse::class, 'course_id');
    }
}
