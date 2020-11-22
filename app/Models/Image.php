<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'src'
    ];

    /**
     * Get all image's avatars
     * @return HasMany
     */
    public function avatars() {
        return $this->hasMany(Avatar::class);
    }

    /**
     * Get User of author_id
     * @return BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
