<?php

namespace App\Http\Controllers;

use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UpdatePasswordController extends Controller
{
        public function index() {
            return view('page.account.updatePassword');
        }

        public function update(Request $request) {

            $user = Auth::user();
            $request->validate([
                'current_password' => ['required', new CurrentPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            $user->update([
                'password'=> Hash::make($request->new_password),
            ]);

            return redirect()->route('profile.index')->with('success', 'Пароль успешно изменен');
        }
}
