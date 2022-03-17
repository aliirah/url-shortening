<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortenUrlRequest;
use App\Models\Url;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function dashboard(): Factory|View|Application
    {
        $urls = Url::latest()->get();
        return view('dashboard', compact('urls'));
    }

    /**
     * @param ShortenUrlRequest $request
     * @return RedirectResponse
     */
    public function shortenUrl(ShortenUrlRequest $request): RedirectResponse
    {
        $slug = generateSlugForUrl();
        $urlCreated = Url::create($request->only('destination') +
            ['slug' => $slug]
        );
        $urlCreated
            ? Alert::success('Successfully', 'Shorten url generated successfully')
            : Alert::errot('Error', 'Oops! Something happened');

        return redirect()->back();
    }

    /**
     * @param Url $url
     * @return RedirectResponse
     */
    public function redirectToDestination(Url $url): RedirectResponse
    {
        return Redirect::to($url->destination);
    }
}
