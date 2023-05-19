@extends('layouts.app')

@section('title', 'Edit Kematian')

@section('styles')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .upload-image:hover {
            cursor: pointer;
            opacity: 0.7;
        }
    </style>
@endsection

@section('content-header')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
        style="background-image: url({{ asset('/img/cover-bg-profil.jpg') }}); background-size: cover; background-position: center top;">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow h-100">
                        <div class="card-header border-0">
                            <div
                                class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                                <div class="mb-3">
                                    <h2 class="mb-0">Edit Data Kematian</h2>
                                    <p class="mb-0 text-sm">Kelola Kematian</p>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('kematian.index') }}?page={{ request('page') }}"
                                        class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i>
                                        Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('layouts.components.alert')
    <div class="container">
        <div class="col">
            <div class="card bg-secondary shadow h-100">
                <div class="card-body">
                    <form action="{{ route('kematian.update', $kematian->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $kematian->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ $kematian->nik }}">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                id="jenis_kelamin">
                                <option selected value="">Pilih Jenis Kelamin</option>
                                <option value="1"
                                    {{ old('jenis_kelamin', $kematian->jenis_kelamin) == 1 ? 'selected="true"' : '' }}>
                                    Laki-laki</option>
                                <option value="2"
                                    {{ old('jenis_kelamin', $kematian->jenis_kelamin) == 2 ? 'selected="true"' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir ..."
                                value="{{ old('tanggal_lahir', $kematian->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kematian">Tanggal Kematian:</label>
                            <input type="date" class="form-control" id="tanggal_kematian" name="tanggal_kematian"
                                value="{{ $kematian->tanggal_kematian }}">
                        </div>

                        <div class="form-group">
                            <label for="tempat_kematian">Tempat Kematian:</label>
                            <input type="text" class="form-control" id="tempat_kematian" name="tempat_kematian"
                                value="{{ $kematian->tempat_kematian }}">
                        </div>

                        <div class="form-group">
                            <label for="penyebab_kematian">Penyebab Kematian:</label>
                            <textarea class="form-control" id="penyebab_kematian" name="penyebab_kematian">{{ $kematian->penyebab_kematian }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--  @section('content')
    <div class="container">
        <h2 class="my-4">Edit Data Kematian</h2>

        <form action="{{ route('kematian.update', $kematian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kematian->nama }}">
            </div>

            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $kematian->nik }}">
            </div>

            <div class="form-group">
                <label for="tanggal_kematian">Tanggal Kematian:</label>
                <input type="date" class="form-control" id="tanggal_kematian" name="tanggal_kematian"
                    value="{{ $kematian->tanggal_kematian }}">
            </div>

            <div class="form-group">
                <label for="tempat_kematian">Tempat Kematian:</label>
                <input type="text" class="form-control" id="tempat_kematian" name="tempat_kematian"
                    value="{{ $kematian->tempat_kematian }}">
            </div>

            <div class="form-group">
                <label for="sebab_kematian">Sebab Kematian:</label>
                <textarea class="form-control" id="sebab_kematian" name="sebab_kematian">{{ $kematian->sebab_kematian }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection  --}}
