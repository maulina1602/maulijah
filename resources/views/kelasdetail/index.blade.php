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
                            <div class="page-header-subtitle">Data Mahasiswa Universitas Neumedira</div>
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
                <div class="card-header">Jadwal Kelas</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary" style="width:130px;">Tambah Data</a>
                    </div>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kelas</th>
                                <th>Nama Dosen</th>
                                <th>Daftar Mahasiswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @php
                                $no = 1;
                            @endphp
                            @forelse($kelasdetail as $pros)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pros->kelas->nama_kelas }}</td>
                                <td>{{ $Pros->dosen->nama_dosen }}</td>
                                <td>{{ $pros->mahasiswa->pivot->nama_maahasiwa }}</td>
                                {{--  @foreach ($collection as $item)

                                @endforeach
                                <td>{{ $pros->kelas->nama_kelas }}</td>
                                <td>{{ $pros->dosen->nama_dosen }}</td>
                                <td>{{ $pros->mahasiswa->nama_mahasiswa }}</td>  --}}
                                {{--  <td>
                                    <ul>
                                        @foreach($kelasdetail->mahasiswa as $mhs)
                                            <li>{{ $mhs->nama_mahasiswa }} ({{ $mhs->pivot->created_at }})</li>
                                        @endforeach
                                    </ul>
                                </td>  --}}

                                <td>
                                    <form action="{{  route('mahasiswa.destroy', $mhs->id) }}" method="POST">
                                        <a class="btn btn-md btn-warning" href="{{ route('mahasiswa.edit', $mhs->id) }}">EDIT</a>

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-md btn-danger">HAPUS</button>
                                    </form>
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
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Action</th>
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
