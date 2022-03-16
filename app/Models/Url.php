<?php

namespace App\Models;

use Carbon\Carbon;
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
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute($date): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y, g:i A');
    }

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
