<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function register_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'phone' => 'required|digits:10',

            'dob' => 'required|date',
            'email' => [
                'required',
                'email:rfc,dns',
                'unique:users,email',
            ],
            'password' => 'required|min:6|confirmed',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
        ]);


        return redirect()->route('user_login_form')->with('success', 'Registration successful! Please log in.');
    }

    function user_login_form()
    {
        return view('user_login_page');
    }

    public function login_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $userId = Auth::id();
            session(['user_id' => $userId]);
            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        }

        // Login failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    function dashboard()
    {
        $total_user = User::count();
        $total_book = Book::count();

        return view('dashboard', compact('total_user', 'total_book'));
    }

    public function user_list(Request $request)
    {
        $query = User::query();
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $users = $query->paginate(10);
        return view('user_list', compact('users'));
    }


    public function edit_user($id)
    {
        $user = User::findOrFail($id);
        return view('edit_user', compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|digits_between:9,10',
            'dob' => 'nullable|date',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
        ]);


        return redirect()->route('user_list')->with('error', 'User updated successfully!');
    }




    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user_list')->with('success', 'User deleted successfully!');
    }
}
