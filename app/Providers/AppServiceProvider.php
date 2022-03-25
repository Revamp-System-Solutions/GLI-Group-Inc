<?php

namespace App\Providers;


use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if(config('app.force_https')) {
        //     $this->app['request']->server->set('HTTPS', true);
        //     URL::forceScheme('https');
        // }

        Inertia::share([
            'app' => [
                'name' => config('app.name'),
            ],
            'gli_guest_tools' => [
                'maps' => \App\Models\WebSetting::where('short_name','gmap_api')->get(['short_name', 'value']),
                'meta' => \App\Models\WebSetting::where('short_name','meta_pltf')->get(['short_name', 'value'])
            ],

        ]);
        Inertia::share('flash', function () {
            return [
                'success' => Session::get('success'),
            ];
        });
         Schema::defaultStringLength(191);
    }

}
