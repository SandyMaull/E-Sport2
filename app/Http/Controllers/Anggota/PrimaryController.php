<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrimaryController extends Controller
{
    public function __construct() {
        $this->middleware('checkusers:anggota');
    }

    public function index()
    {
        return view('anggota.index');
    }
}
