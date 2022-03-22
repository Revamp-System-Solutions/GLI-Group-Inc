<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'csrf_token' => csrf_token(),    
            'flash' => [
                'success' => fn () => $request->session()->get('success')
            ],
            'gli_guest_tools' => [
                'maps' => \App\Models\WebSetting::where('short_name','gmap_api')->get(['short_name', 'value']),
                'meta' => \App\Models\WebSetting::where('short_name','meta_pltf')->get(['short_name', 'value'])
            ],
            'auth.user' => fn () => $request->user() ? $request->user()->only('name', 'email', 'roles') : null
        ]);
    }
}
