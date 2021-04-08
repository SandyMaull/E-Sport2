<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Anggota;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.anggota_register');
    }

    public function create(Request $request)
    {
        $this->validator($request);
        // dd($request->all());
        if ($files = $request->file('identitas')) {
            $destinationPath = public_path('/foto_iden/');
            $photoName = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $photoName);
            $dbcontrol = new Anggota;
            $dbcontrol->name = $request->name;
            $dbcontrol->username = $request->username;
            $dbcontrol->password = Hash::make($request->password);
            $dbcontrol->nmor_wa = $request->no_wa;
            $dbcontrol->foto_identitas = '/foto_iden/' . $photoName;
            $dbcontrol->pekerjaan = 'Kosong';
            $dbcontrol->verified = 'no';
        }
        if ( $dbcontrol->save() ) {
            return redirect(route('anggota.login'))->with('status', 'Akun anda berhasil dibuat, silahkan login.');
        }
    }

    private function validator(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'username'  =>  'required|string|unique:anggotas|min:5|max:191',
            'password'  =>   'required|string|min:4|max:255',
            'no_wa' => 'required|regex:/^(62)[0-9]/|min:10|max:13',
            'identitas' => 'required|image|mimes:jpeg,png,jpg,svg|max:4096',
        ];
        $messages = [
            'username.unique' => 'Username sudah terdaftar.',
            'username.min' => 'Username minimal berjumlah 5 karakter.',
            'username.max' => 'Username maximal berjumlah 191 karakter.',
            'password.min' => 'Password minimal berjumlah 4 karakter.',
            'password.max' => 'Password maximal berjumlah 255 karakter.',
            'no_wa.regex' => 'Format nomor telp salah, silahkan isi dengan contoh: 6282260879021.',
            'no_wa.min' => 'Format nomor telp salah, minimal jumlah digit angka adalah 8 angka dibelakang 62.',
            'no_wa.max' => 'Format nomor telp salah, maximal jumlah digit angka adalah 11 angka dibelakang 62.',
            'identitas.mimes' => 'Format extensions image harus berupa .jpeg, .png, .jpg, dan .svg .',
            'identitas.max' => 'Image maximal size adalah 4MB.'
        ];
        return $request->validate($rules,$messages);
    }
}
