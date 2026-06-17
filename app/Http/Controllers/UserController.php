<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles')->paginate(15);
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    public function create(): View
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
    $request->validate([
        'name'          => ['required', 'string', 'max:255'],
        'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'      => ['required', 'string', 'min:8', 'confirmed'],
        'role_name'     => ['required', 'string', 'exists:roles,name'],
        'card_id'       => ['nullable', 'string', 'max:50'],
        'phone_number'  => ['nullable', 'string', 'max:20'],
        'address'       => ['nullable', 'string', 'max:500'],
        'profile_image' => ['nullable', 'image', 'max:2048'],
    ]);

    $imagePath = null;
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('profiles', 'public');
    }

    $user = User::create([
        'name'          => $request->name,
        'email'         => $request->email,
        'password'      => Hash::make($request->password),
        'card_id'       => $request->card_id,
        'phone_number'  => $request->phone_number,
        'address'       => $request->address,
        'profile_image' => $imagePath,
    ]);

    $user->assignRole($request->role_name);

    return redirect()->route('users.index')->with('success', "Empleado {$user->name} registrado con éxito.");
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role_name' => ['required', 'string', 'exists:roles,name'],
        ]);

        $user->syncRoles($request->role_name);
        return redirect()->route('users.index')->with('success', "Rol actualizado con éxito para el empleado {$user->name}.");
    }
}
