<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SirkulaController extends Controller
{
    public function formRegister()
    {
        return view('sirkula.register');
    }

    public function prosesRegister(Request $request)
    {
        $data = $request->validate([
            'role' => ['required', 'in:warga,pengurus'],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'no_hp' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'max:72'],
            'rt' => ['required_if:role,warga', 'nullable', 'digits_between:1,3'],
            'rw' => ['required_if:role,warga', 'nullable', 'digits_between:1,3'],
            'alamat' => ['required_if:role,warga', 'nullable', 'string', 'max:180'],
            'jabatan' => ['nullable', 'string', 'max:100'],
        ]);

        $request->session()->put('sirkula.pendaftar', [
            'role' => $data['role'],
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'password_hash' => Hash::make($data['password']),
            'rt_rw' => $data['role'] === 'warga'
                ? str_pad($data['rt'], 2, '0', STR_PAD_LEFT).'/'.str_pad($data['rw'], 2, '0', STR_PAD_LEFT)
                : null,
            'alamat' => $data['role'] === 'warga' ? $data['alamat'] : null,
            'jabatan' => $data['role'] === 'pengurus'
                ? ($data['jabatan'] ?: 'Pengurus RT/RW')
                : null,
        ]);
        $request->session()->forget('sirkula.login');

        return redirect()->route('sirkula.login')
            ->with('success', 'Pendaftaran demo berhasil. Silakan masuk dengan akun yang baru dibuat.');
    }

    public function formLogin()
    {
        return view('sirkula.login');
    }

    public function prosesLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $pendaftar = $request->session()->get('sirkula.pendaftar');

        if (!$pendaftar ||
            !hash_equals($pendaftar['email'], $data['email']) ||
            !Hash::check($data['password'], $pendaftar['password_hash'])) {
            return back()->withErrors([
                'email' => 'Email atau kata sandi tidak sesuai dengan akun demo pada sesi ini.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('sirkula.login', [
            'nama_lengkap' => $pendaftar['nama_lengkap'],
            'role' => $pendaftar['role'],
        ]);

        return redirect()->route('sirkula.'.$pendaftar['role'].'.dashboard');
    }

    public function halaman(Request $request, string $role, string $halaman)
    {
        $pengguna = $request->session()->get('sirkula.login');
        if (!$pengguna) {
            return redirect()->route('sirkula.login')
                ->with('info', 'Silakan login terlebih dahulu.');
        }
        if ($pengguna['role'] !== $role) {
            abort(403, 'Halaman ini hanya untuk peran yang sesuai.');
        }

        $judul = [
            'dashboard' => 'Beranda', 'sampah' => 'Bank Sampah',
            'iuran' => 'Iuran Digital', 'kebun' => 'Kebun Warga',
            'lapor' => 'Laporan Warga', 'akun' => 'Akun',
        ][$halaman] ?? 'Halaman';

        return view('sirkula.halaman', compact('pengguna', 'role', 'halaman', 'judul'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('sirkula.login');
        $request->session()->regenerateToken();

        return redirect()->route('sirkula.login')->with('info', 'Berhasil keluar dari akun demo.');
    }
}
