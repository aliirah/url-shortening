<?php

use App\Models\Url;
use Illuminate\Support\Str;

if (! function_exists('generateSlugForUrl')) {
    function generateSlugForUrl(): string
    {
        do {
            $slug = Str::random(5);
        } while (Url::whereSlug($slug)->first());

        return $slug;
    }
}
