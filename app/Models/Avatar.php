<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avatar extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'image_id',
        'src_256x256', 'src_128x128', 'src_64x64'
    ];

    /**
     * Get User from author_id
     * @return BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get Image from image_id
     * @return BelongsTo
     */
    public function image() {
        return $this->belongsTo(Image::class);
    }
}
