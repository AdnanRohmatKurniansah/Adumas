<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }
    public function registerMasyarakat(Request $request) {
        $data = $request->validate([
            'nik' => 'required|max:16|unique:masyarakats',
            'nama' => 'required|max:35',
            'username' => 'required|max:25|unique:masyarakats',
            'telp' => 'required|max:13',
            'password' => 'required|max:32',
        ]);

        $data["password"] = Hash::make($data["password"]);

        Masyarakat::create($data);

        return redirect('/auth/login')->with('success', 'Berhasil registrasi');
    }
    public function login() {
        return view("auth.login");
    }
    public function authenticate(Request $request) {
        $data = $request->validate([
            'username' => 'required|max:10',
            'password' => 'required|max:32'
        ]);

        $masyarakat = Masyarakat::where('username', $data['username'])->first();
        $petugas = Petugas::where('username', $data['username'])->first();

        if ($masyarakat) {
            $guard = 'masyarakat';
            $credentials = [
                'username' => $masyarakat->username,
                'password' => $data['password'],
            ];
            $redirectPath = '/dashboard/pengaduan';
        } elseif ($petugas) {
            $guard = 'petugas';
            $credentials = [
                'username' => $petugas->username,
                'password' => $data['password'],
            ];
            $redirectPath = '/dashboard';
        } else {
            return back()->with('error', 'Username atau Password salah');
        }

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect($redirectPath)->with('success', 'Berhasil login');
        }

        return back()->with('error', 'Username atau Password salah');
    }
    public function logout() {
        if (Auth::guard('masyarakat')->check() || Auth::guard('petugas')->check()) {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }
    
        return redirect('/')->with('info', 'Berhasil logout');
    }
}
