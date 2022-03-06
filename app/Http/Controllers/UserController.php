<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $roles = Role::get()->all();
        $users = User::whereIsActive(true)->with('roles')->orderBy('id', 'ASC')->paginate(
            $perPage = 12, $columns = ['*'], $pageName = 'uup'
        ); 
        return Inertia::render('Admin/Site/UserManager')
                        ->with('users', $users)
                        ->with('roles', $roles);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'role' => ['required']
              ]);
            $user = User::where('id', $request->id)->firstOrFail();;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
    
            $user->roles()->sync([$request->role]);

            $request->session()->flash('success',' User Data Updated!|>><<|User Info changed successfully');
            return back();
    }
    public function disable(Request $request)
    {
        $user = User::find($request->id);

        $user->is_active = false; 
        $user->save();
        $request->session()->flash('success',' User Deactivated!|>><<|Account now restricted from logging in');
        return back();
    }
}
