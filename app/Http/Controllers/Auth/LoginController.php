<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use App\Justification;
use App\User;


class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest', ['only' => 'showLoginForm']);
    // }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->rol == 0) {
                return redirect()->intended('alumno/index');
            } elseif (auth()->user()->rol == 2) {
                return redirect('administrador/index');
            } elseif (auth()->user()->rol == 1) {
                return redirect('coordinador/index');
            }elseif (auth()->user()->rol == 3) {
                return redirect('super/index');
            }
        } else {
            return back()
                ->withErrors(['email' => 'Estas credenciales no concuerdan con nuestros registros'])
                ->withInput(request(['email']));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
