<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PermissionService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use PermissionService;

    public function index()
    {

    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store()
    {

    }

    public function edit(User $user)
    {

    }

    public function update(User $user)
    {

    }

    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::back()->with('success', 'User deleted.');
    }

    public function restore(User $user)
    {
        $user->restore();

        return Redirect::back()->with('success', 'User restored.');
    }
}
