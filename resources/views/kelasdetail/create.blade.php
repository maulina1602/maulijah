@extends('layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Mahasiswa
                            </h1>
                            <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                        </div>
                        <div class="col-12 col-xl-auto mt-4">
                            <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">Data Mahasiswa</div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Nama Mhs *</label>
                            <input class="form-control" type="text" placeholder="Masukan nama mahasiswa" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">NPM *</label>
                            <input class="form-control" type="text" placeholder="Masukan NPM Mahasiswa" name="npm">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Email *</label>
                            <input class="form-control" type="email" placeholder="maulina@gmail.com" name="email">
                        </div>
                        {{--  <div class="form-group">
                            <label for="exampleInputEmail1">Nama Dosen Pembimbing *</label>
                            <select name="dosen_id" class="form-control">
                                <option selected value="0">-- Pilih Dospem --</option>
                                @foreach ($dosen as $ds)
                                    <option value="{{ $ds->id }}">{{$ds->nama_dosen}}</option>
                                @endforeach
                            </select>
                        </div>  --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Kelas *</label>
                            <select name="kelas_id" class="form-control">
                                <option selected value="0">-- Pilih Kelas --</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Jurusan *</label>
                            <select name="jurusan_id" class="form-control">
                                <option selected value="0">-- Pilih Kelas --</option>
                                @foreach ($jurusan as $jrs)
                                    <option value="{{ $jrs->id }}">{{$jrs->nama_jurusan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Foto *</label>
                            <input class="form-control" type="file" placeholder="" name="foto">
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
