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
                <div class="card-header">Edit Data Mahasiswa</div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input class="form-control" value="{{ $mahasiswa->nama_mahasiswa }}" type="text" placeholder="Masukan nama mahasiswa" name="nama_mahasiswa">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">NPM</label>
                            <input class="form-control" value="{{ $mahasiswa->npm }}" type="text" placeholder="Masukan NPM Mahasiswa" name="npm">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Email</label>
                            <input class="form-control" value="{{ $mahasiswa->email }}" type="email" placeholder="maulina@gmail.com" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Kelas</label>
                            <select name="kelas_id" class="form-control" type="text">
                                <option selected disabled {{ old("kelas_id") == $mahasiswa->kelas_id ? "selected":" "}} value="{{$mahasiswa->kelas_id}}">{{$mahasiswa->kelas->nama_kelas}} </option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Jurusan</label>
                            <select name="jurusan_id" class="form-control" type="text">
                                <option selected disabled {{ old("jurusan_id") == $mahasiswa->jurusan_id ? "selected":" "}} value="{{$mahasiswa->jurusan_id}}">{{$mahasiswa->jurusan->nama_jurusan}} </option>
                                @foreach ($jurusan as $jrs)
                                    <option value="{{ $jrs->id }}">{{$jrs->nama_jurusan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Foto</label>
                            <input class="form-control" value="{{ $mahasiswa->foto }}" type="file" id="image" placeholder="" name="foto">
                        </div>
                        <div class="col-sm-3">
                            <label class="" for="image">Preview</label>
                            <div>
                                <img src="{{ asset('storage/images/'. $mahasiswa->foto) }}" alt="" class="img-fluid" width="150" height="150">
                            </div>
                        </div>
                        <p></p>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
