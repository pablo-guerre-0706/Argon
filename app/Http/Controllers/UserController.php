<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles')->paginate(15);
        $roles = Role::all();
        return View('users.index', compact('users', 'roles'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role_name' => ['required', 'string', 'exists:role,name'],
        ]);
            $user->syncRoles($request->role_name);
            return redirect()->route('users.index')->with('success', 'Rol actualizado con exito para el empleado #{$user->name}.');
    }
}
