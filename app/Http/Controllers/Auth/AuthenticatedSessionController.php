<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if(!is_null($user)) {
            $role = $user->role;
            if ($role == 1) {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended('admin/management');
            }
            if ($role == 2) {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended('representative/management');
            }
            if ($role == 3) {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect('/');
            }
        } else {
            return back()->with('message', 'ユーザーが登録されていません。');
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
