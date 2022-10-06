<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\File;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;
// use Mahasiswa as GlobalMahasiswa;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::join('dosen', 'kelas.dosen_id', '=', 'dosen.id')->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::select('id', 'nama_dosen')->get();
        return view('kelas.create', compact('dosen'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $this->validate($request, [
            'dosen_id'      => 'min:1',
            'kode_kelas'    => 'required',
            'nama_kelas'    => 'required',
            // 'mahasiswa_id'    => 'required',
        ]);

        Kelas::create([
            'dosen_id'      => $request->dosen_id,
            'kode_kelas'    => $request->kode_kelas,
            'nama_kelas'    => $request->nama_kelas,
        ]);

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        $dosen = Dosen::all();
        $kelas = $kela;
        return view('kelas.edit', compact('kelas', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $kelas = $kela;
        $kela->update([
            'dosen'         => $request->get('dosen_id'),
            'kelas'         => $request->get('kelas_id'),
            'kode_kelas'    => $request->get('kode_kelas'),
            'nama_kelas'    => $request->get('nama_kelas'),
        ]);
        return redirect()->route('kelas.index', compact('kelas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}
