<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'slug'
    ];

    /**
     * Get the user's first name.
     *
     * @return string
     */
    protected function getShortenUrlAttribute(): string
    {
        return \Illuminate\Support\Facades\URL::to('/') . "/{$this->slug}";
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
