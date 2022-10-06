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
                                Kelas
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
                <div class="card-header">Data kelas</div>
                <div class="card-body">
                    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">KD Kelas</label>
                            <input class="form-control" value="{{ $kelas->kode_kelas }}" type="text" placeholder="" name="kode_kelas">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Nama Kelas</label>
                            <input class="form-control" value="{{ $kelas->nama_kelas }}" type="text" placeholder="Masukan nama kelas" name="nama_kelas">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Nama Dosen</label>
                            <select name="dosen_id" class="form-control" type="text">
                                <option selected disabled {{ old("dosen_id") == $kelas->dosen_id ? "selected":" "}} value="{{$kelas->dosen_id}}">{{$kelas->dosen->nama_dosen}} </option>
                                @foreach ($dosen as $dos)
                                    <option value="{{ $dos->id }}">{{$dos->nama_dosen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('kelas.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
