<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function form()
    {
        return view('form-banjir');
    }

    public function proses(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'desa' => 'required|string|max:100',
            'tinggi' => 'required|numeric|min:0|max:1000',
        ]);

        return view('hasil-banjir', [
            'laporan' => $data
        ]);
    }
}
