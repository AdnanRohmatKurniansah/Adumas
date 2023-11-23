<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function listPengaduan() {
        return view('dashboard.tanggapan.index', [
            'pengaduans' => Pengaduan::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function verifikasi(Request $request) {
        $data = $request->validate([
            'id_pengaduan' => 'required',
            'status' => 'required'
        ]);

        Pengaduan::where('id', $data['id_pengaduan'])
            ->update([
                'status' => $data['status']
            ]);

        return redirect('/dashboard/tanggapan')->with('info', 'Status pengaduan diubah!');
    }

    public function tanggapi(Request $request) {
        $data = $request->validate([
            'id_pengaduan' =>'required',
            'tanggapan' => 'required'
        ]);
        
        $data['id_petugas'] = Auth::guard('petugas')->user()->id;

        Tanggapan::create($data);

        return back()->with('success', 'Berhasil memberikan tanggapan!');
    }
}
