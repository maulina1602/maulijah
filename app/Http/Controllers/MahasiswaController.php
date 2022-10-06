<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mhsproses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\File;
use App\Models\Kelas;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['kelas', 'jurusan'])->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::select('id', 'nama_jurusan')->get();
        $kelas   = Kelas::select('id', 'nama_kelas')->get();
        return view('mahasiswa.create', compact('jurusan', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'jurusan_id'        => 'min:1',
            'kelas_id'          => 'min:1',
            'nama_mahasiswa'    => 'required',
            'npm'               => 'required',
            'email'             => 'required',
            'foto'              => 'required',
        ]);


        $namafoto = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('public/images/', $namafoto);


        Mahasiswa::create([
            'jurusan_id'        => $request->jurusan_id,
            'kelas_id'          => $request->kelas_id,
            'nama_mahasiswa'    => $request->nama_mahasiswa,
            'npm'               => $request->npm,
            'email'             => $request->email,
            'foto'              => $namafoto,
        ]);

        return redirect()->route('mahasiswa.index');
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
    public function edit(Mahasiswa $mahasiswa)
    {
        // $dosen = Dosen::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {

        if ($request->hasFile('foto')) {
            $images = $request->file('foto')->store('content');
        } else {
            $images = $mahasiswa->foto;
        }
        $mahasiswa->update([
            'kelas'             => $request->get('kelas_id'),
            'jurusan'           => $request->get('jurusan_id'),
            'nama_mahasiswa'    => $request->get('nama_mahasiswa'),
            'npm'               => $request->get('npm'),
            'email'             => $request->get('email'),
            'foto'              => $images,
        ]);
        return redirect()->route('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
