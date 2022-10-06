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
                            <div class="page-header-subtitle">Data Kelas Mahasiswa Universitas Neumedira</div>
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
                <div class="card-header">Data Kelas</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('kelas.create') }}" class="btn btn-primary" style="width:130px;">Tambah Data</a>
                    </div>
                    {{--  <div>
                        <a href="{{ route('kelas.form') }}" class="btn btn-primary" style="width:130px;">Ambil kelas</a>
                    </div>  --}}
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Nama Dosen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @php
                                $no = 1;
                            @endphp
                            @forelse($kelas as $kls)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kls->kode_kelas }}</td>
                                <td>{{ $kls->nama_kelas }}</td>
                                <td>{{ $kls->dosen->nama_dosen }}</td>
                                <td>
                                    <form action="{{ route('kelas.destroy', $kls->id) }}" method="POST">
                                        <a class="btn btn-md btn-warning" href="{{ route('kelas.edit', $kls->id) }}">EDIT</a>

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-md btn-danger">HAPUS</button>
                                    </form>
                                </td>
                                <td>

                                </td>
                            </tr>
                            @empty
                            <tr colspan="3" class="text-center text-danger">
                                <td>Maaf Tidak Ada Data Yang Ditambahkan</td>
                            </tr>
                            @endforelse
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Kode Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Nama Dosen</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
