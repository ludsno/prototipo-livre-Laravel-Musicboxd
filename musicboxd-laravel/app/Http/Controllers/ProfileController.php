<?php

// namespace App\Http\Controllers;

// use App\Http\Requests\ProfileUpdateRequest;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\View\View;



// class ProfileController extends Controller
// {
//     //     /**
//     //      * Display the user's profile form.
//     //      */
//     //     public function __construct()
//     //     {
//     //         $this->middleware('auth')->except('show'); // Require login except for show
//     //     }



//     public function edit(Request $request): View
//     {
//         return view('profile.edit', [
//             'user' => $request->user(),
//         ]);
//     }

//     /**
//      * Display the user's profile.
//      */
//     public function show(): View
//     {
//         $user = auth()->user();
//         $reviews = $user->reviews()->with('song')->orderBy('date', 'desc')->get();
//         return view('profile', compact('user', 'reviews'));
//     }

//     // public function show()
//     // {
//     //     $user = auth()->user();
//     //     $reviews = $user->reviews()->with('song')->orderBy('date', 'desc')->get();
//     //     return view('profile', compact('user', 'reviews'));
//     // }

//     /**
//      * Update the user's profile information.
//      */
//     public function update(ProfileUpdateRequest $request): RedirectResponse
//     {
//         $request->user()->fill($request->validated());

//         if ($request->user()->isDirty('email')) {
//             $request->user()->email_verified_at = null;
//         }

//         $request->user()->save();

//         return Redirect::route('profile.edit')->with('status', 'profile-updated');
//     }

//     /**
//      * Delete the user's account.
//      */
//     public function destroy(Request $request): RedirectResponse
//     {
//         $request->validateWithBag('userDeletion', [
//             'password' => ['required', 'current_password'],
//         ]);

//         $user = $request->user();

//         Auth::logout();

//         $user->delete();

//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return Redirect::to('/');
//     }
// }




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $reviews = $user->reviews()->with('song')->orderBy('date', 'desc')->get();
        return view('profile', compact('user', 'reviews'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));
        return redirect()->route('profile.show')->with('success', 'Perfil atualizado com sucesso!');
    }
}