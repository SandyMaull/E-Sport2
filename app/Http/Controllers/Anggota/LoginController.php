<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:anggota,anggota.home')->except('logout');
    }
    
    public function index()
    {
        return view('auth.anggota_login');
    }

    public function login(Request $request)
    {
        $this->validator($request);
        
        if($this->guard()->attempt($request->only('username','password'))){
            //Authentication passed...
            // return redirect('/');
            return redirect()
                ->intended(route('anggota.home'))
                ->with([
                    'status' => 'success',
                    'message' => 'Anda berhasil login!'
                ]);
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('anggota.login'))->with('status', 'Anda telah Logout!');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'username'    => 'required|string|exists:anggotas|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'username.exists' => 'Username belum terdaftar.',
            'username.min' => 'Username minimal berjumlah 5 karakter.'
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Password yang anda masukan salah!');
    }

    protected function guard()
    {
        return Auth::guard('anggota');
    }
}
