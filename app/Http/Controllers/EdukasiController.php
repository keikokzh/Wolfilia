<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    public function panduan()
    {
        return view('edukasi.panduan');
    }

    public function pengolahan()
    {
        return view('edukasi.pengolahan');
    }

    public function pemecahan()
    {
        return view('edukasi.pemecahan');
    }
}
