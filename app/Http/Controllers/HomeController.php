<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function verifyanggota()
    {
        $anggota = Anggota::where('verified', 'no')->get();
        return view('admin.verifyanggota', [
            'anggota' => $anggota
        ]);
    }

    public function verifyanggotapost(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id_ang' => 'required',
            'action_ang' => 'required|in:Menerima,Menghapus',
        ]);
        if ($request->action_ang == 'Menerima') {
            $ang = Anggota::where('id', $request->id_ang)->update(['verified' => 'yes']);
            return redirect(route('verifypage'))->with(['status' => 'success','message' => 'Data Berhasil Dirubah!']);
        }
    }
}
