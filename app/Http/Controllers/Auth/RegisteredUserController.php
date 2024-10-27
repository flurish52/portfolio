<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

//        Auth::login($user);

//        return redirect(route('dashboard', absolute: false));
        return redirect(route('alert'));
    }
    public function adminAddUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
    }

    public function addSubscriber(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'subscriber',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        return redirect(route('alert'));
    }

    public function viewSubscriber()
    {
        return inertia::render('Auth/Subscribers', [
            'subscribersList' => User::where('role', 'subscriber')->get(),
        ]);
    }
    public function adminCreateUser()
    {
        return inertia::render('Auth/AdminCreateUser', [

        ]);
    }

    public function adminViewUser()
    {
        return inertia::render('Auth/ViewUsers', [
            'usersList' => User::where('role', 'user')->get()
        ]);
    }

    public function destroy($id)
    {
        $user =  User::find($id);
        if ($user){
            $user->delete();
        }
    }
}
