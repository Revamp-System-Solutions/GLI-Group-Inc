<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Auth;
use WebReinvent\CPanel\CPanel;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware("auth")->except(["index"]);
    }

    public function index()
    {
       
    }

    public function viewDashboard()
    {
        $cpanel = new CPanel();
        $response = $cpanel->callUAPI(
            'ResourceUsage',
            'get_usages'
        );
        $statistics =array();
        foreach($response["data"]->data as $key => $item){
          
            $statistics[$item->id] = $item;
            unset($statistics[$item->id]->id);
        }
       
      
        return Inertia::render('Admin/Dashboard')
        ->with('page_links', collect(Cache::get('admin_page_links'))->mapToGroups(function($item, $key){
            return [boolval($item['is_parent']) && boolval($item['is_active']) ? 'parentLinks':'subLinks' => $item];
        }))
        ->with('statistics', $statistics)
        ->with('auth.user', Auth::user()->only('name', 'email', 'roles'));
    }

}
