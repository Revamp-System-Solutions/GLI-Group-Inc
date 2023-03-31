<?php

namespace App\Providers;


use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use App\Models\PageLinks;


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
        $cpage_links = collect(PageLinks::get()->all())->mapToGroups(function($item, $key){
            return [boolval($item['is_admin'])&& boolval($item['is_active']) ? 'admin_links': (!boolval($item['is_active']) ? 'inactive':'guest_links') => $item];
        });
        $admin_page_links = Cache::put('admin_page_links', $cpage_links->get('admin_links'));
        $guest_page_links = Cache::put('guest_page_links', $cpage_links->get('guest_links'));
        Schema::defaultStringLength(191);
    }

}
