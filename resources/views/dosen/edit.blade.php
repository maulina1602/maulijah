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
                                Dosen
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
                <div class="card-header">Edit Data Dosen</div>
                <div class="card-body">
                    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input class="form-control" value="{{ $dosen->nama_dosen }}" type="text" placeholder="Masukan nama dosen" name="nama_dosen">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">NIP</label>
                            <input class="form-control" value="{{ $dosen->nip }}" type="number" placeholder="Masukan NIP dosen" name="nip">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Email</label>
                            <input class="form-control" value="{{ $dosen->email }}" type="email" placeholder="monday@gmail.com" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Foto</label>
                            <input class="form-control" value="{{ $dosen->foto }}" type="file" id="image" placeholder="" name="foto">
                        </div>
                        <div class="col-sm-3">
                            <label class="" for="image">Preview</label>
                            <div>
                                <img src="{{ asset('storage/images/'. $dosen->foto) }}" alt="" class="img-fluid" width="150" height="150">
                            </div>
                        </div>
                        <p></p>

                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit" >Update</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
