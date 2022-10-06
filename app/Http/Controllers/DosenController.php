<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Kelasdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\File;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all(); // select * from dosen
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dosen'    => 'required',
            'nip'           => 'required',
            'email'         => 'required',
            'foto'          => 'required',
        ]);

        $namafoto = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('public/images/', $namafoto);


        Dosen::create([
            'nama_dosen'    => $request->nama_dosen,
            'nip'           => $request->nip,
            'email'         => $request->email,
            'foto'          => $namafoto,
        ]);

        return redirect()->route('dosen.index');
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
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        if ($request->hasFile('foto')) {
            $images = $request->file('foto')->store('content');
        } else {
            $images = $dosen->foto;
        }
        $dosen->update([
            'nama_dosen'    => $request->get('nama_dosen'),
            'nip'           => $request->get('nip'),
            'email'         => $request->get('email'),
            'foto'          => $images,
        ]);
        return redirect()->route('dosen.index', compact('dosen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index');
    }
}
