<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Barryvdh\DomPDF\Facade\Pdf;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::guard('masyarakat')->user()->id;
        return view('dashboard.pengaduan.index', [
            'pengaduans' => Pengaduan::where('id_masyarakat', $id)->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:150',
            'slug'  => 'required|unique:pengaduans',
            'isi_laporan' => 'required',
            'foto' => 'image|file|max:2048',
        ]);  
        
        if($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-pengaduan');
        } 

        $data['id_masyarakat'] = Auth::guard('masyarakat')->user()->id;

        Pengaduan::create($data);
        
        return redirect('/dashboard/pengaduan')->with('success', 'Pengaduan baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('dashboard.pengaduan.detail', [
            'pengaduan' => $pengaduan,
            'tanggapans' => Tanggapan::where('id_pengaduan', $pengaduan->id)->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('dashboard.pengaduan.edit', [
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $rules = [
            'judul' => 'required|max:150',
            'isi_laporan' => 'required',
            'foto' => 'image|file|max:2048',
        ];  
        
        if($request->slug != $pengaduan->slug) {
            $rules['slug'] = 'required|unique:pengaduans';
        }

        $data = $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $data['foto'] = $request->file('foto')->store('foto-pengaduan');
        } 

        $pengaduan->update($data);
        
        return redirect('/dashboard/pengaduan')->with('info', 'Pengaduan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            Storage::delete($pengaduan->foto);
        }
        
        Pengaduan::destroy($pengaduan->id);
        return redirect('/dashboard/pengaduan')->with('success', 'Pengaduan berhasil dihapus!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pengaduan::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
    public function generateLaporan(Request $request) {
        $dari = $request->dari;
        $sampai = $request->sampai;
    
        $pengaduans = Pengaduan::whereBetween('updated_at', [$dari, $sampai])->get();
    
        if ($pengaduans->count() < 1) {
            return back()->with('error', 'Tidak ada pengaduan dlm rentang waktu tersebut');
        }
    
        $pdf = Pdf::loadView('dashboard.laporan', [
            'pengaduans' => $pengaduans
        ])->setOptions(['defaultFont' => 'sans-serif']);
    
        return $pdf->stream('laporan.pdf');
    }
}
