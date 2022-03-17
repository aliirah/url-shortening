<?php

namespace App\Http\Controllers\Api;

use App\Facades\Rest\Rest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShortenUrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;

class UrlController extends Controller
{
    public function shortenUrl(ShortenUrlRequest $request)
    {
        $slug = generateSlugForUrl();
        $urlCreated = Url::create($request->only('destination') +
            ['slug' => $slug]
        );

//        Personally, I prefer return Resource but the response data won"t be the same as you want
//        It will be wrapped in data field
//        return Rest::ok(new UrlResource($urlCreated));

        return Rest::ok([
            "destination" => $urlCreated->destination,
            "slug" => $urlCreated->slug,
            "updated_at" => $urlCreated->updated_at,
            "created_at" => $urlCreated->created_at,
            'id' => $urlCreated->id,
            'shortened_url' => $urlCreated->shorten_url
        ]);
    }
}
