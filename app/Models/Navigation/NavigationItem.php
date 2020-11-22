<?php

namespace App\Models\Navigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'title', 'fa-icon',
        'menuable_id', 'menuable_type',
    ];

    /**
     * Get Menu of menu_id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu() {
        return $this->belongsTo(NavigationMenu::class);
    }

    /**
     * Get model of menuable
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function menuable() {
        return $this->morphTo();
    }
}
