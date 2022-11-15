<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auth;
use  App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public $data = [];
    public function login()
    {

        return view('pages.auth.login');
    }

    public function handleLogin(LoginRequest $req)
    {
        $user = Auth::where('email', $req->email)->first();
        if ($user) {

            if ($user->password != $req->password) return back()->with('invalidPassword', 'Mật khẩu không đúng');
            else {
                session_start();
                $req->session()->put('user', $user);

                // dd($user);
                return redirect(route('admin.home'));
            }
        } else {
            return back()->with('notfoundEmail', 'Không tìm thấy username');
        }
    }

    public function handleLogout(Request $req)
    {

        if ($req->session()->get('user') != null) {
            // dd($req->session()->get('user'));
            $req->session()->forget('user');
            return redirect(route('auth.login'));
        }
    }
}
