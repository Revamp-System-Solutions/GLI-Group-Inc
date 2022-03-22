<?php

namespace App\Http\Controllers;


use App\Models\WebSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;


class WebSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        
    }

    public function getWebSettings(){
        return collect(WebSetting::whereIsActivated(true)->orderBy('settings_group', 'asc')->get()->all())->mapToGroups(function ($item, $key) {
            $item['value'] = json_decode($item['value'], true);
            return [$item['settings_group'] => $item->makeHidden('settings_group')];
        });

    }
    public function getGuestTools(){
        return collect(WebSetting::orderBy('settings_group', 'asc')->get()->except(['site_inf','social_links']))->mapToGroups(function ($item, $key) {
            $item['value'] = json_decode($item['value'], true);
            return [$item['settings_group'] =>  $item['value']];
        });

    }
}
