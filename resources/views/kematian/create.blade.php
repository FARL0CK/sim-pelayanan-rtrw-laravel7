@extends('layouts.app')

@section('title', 'Tambah Kematian')

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
                                    <h2 class="mb-0">Tambah Data Kematian</h2>
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
    {{--  <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Data Kematian</div>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('kematian.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="nik" class="col-md-4 control-label">NIK</label>

                                <div class="col-md-6">
                                    <input id="nik" type="int" class="form-control" name="nik"
                                        value="{{ old('nik') }}" required autofocus>

                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama"
                                        value="{{ old('nama') }}" required>

                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tanggal_kematian') ? ' has-error' : '' }}">
                                <label for="tanggal_kematian" class="col-md-4 control-label">Tanggal Kematian</label>

                                <div class="col-md-6">
                                    <input id="tanggal_kematian" type="date" class="form-control" name="tanggal_kematian"
                                        value="{{ old('tanggal_kematian') }}" required>

                                    @if ($errors->has('tanggal_kematian'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal_kematian') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                                <label for="tanggal_lahir" class="col-md-4 control-label">Tanggal Lahir</label>

                                <div class="col-md-6">
                                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}" required>

                                    @if ($errors->has('tanggal_lahir'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" id="jenis_kelamin">
                                    <option selected value="">Pilih Jenis Kelamin</option>
                                    <option value="1" {{ old('jenis_kelamin') == 1 ? 'selected="true"' : '' }}>
                                        Laki-laki</option>
                                    <option value="2" {{ old('jenis_kelamin') == 2 ? 'selected="true"' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('tempat_kematian') ? ' has-error' : '' }}">
                                <label for="tempat_kematian" class="col-md-4 control-label">Tempat Kematian</label>

                                <div class="col-md-6">
                                    <input id="tempat_kematian" type="text" class="form-control" name="tempat_kematian"
                                        value="{{ old('tempat_kematian') }}" required>

                                    @if ($errors->has('tempat_kematian'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tempat_kematian') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('penyebab_kematian') ? ' has-error' : '' }}">
                                <label for="penyebab_kematian" class="col-md-4 control-label">Penyebab Kematian</label>

                                <div class="col-md-6">
                                    <input id="penyebab_kematian" type="text" class="form-control"
                                        name="penyebab_kematian" value="{{ old('penyebab_kematian') }}" required>

                                    @if ($errors->has('penyebab_kematian'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('penyebab_kematian') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}

    <div class="container">
        <div class="col">
            <div class="card bg-secondary shadow h-100">
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('kematian.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-12">
                            <label class="form-control-label" for="nik">NIK</label>
                            <input maxlength="16" minlength="16" type="text" onkeypress="return hanyaAngka(event)"
                                class="form-control @error('nik') is-invalid @enderror" name="nik"
                                placeholder="Masukkan NIK ..." value="{{ old('nik') }}">
                            @error('nik')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                placeholder="Masukkan Nama ..." value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group{{ $errors->has('tanggal_kematian') ? ' has-error' : '' }}">
                            <label for="tanggal_kematian" class="col-md-12 control-label">Tanggal Kematian</label>

                            <div class="col-md-12">
                                <input id="tanggal_kematian" type="date" class="form-control" name="tanggal_kematian"
                                    value="{{ old('tanggal_kematian') }}" required>

                                @if ($errors->has('tanggal_kematian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_kematian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                            <label for="tanggal_lahir" class="col-md-12 control-label">Tanggal Lahir</label>

                            <div class="col-md-12">
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}" required>

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                id="jenis_kelamin">
                                <option selected value="">Pilih Jenis Kelamin</option>
                                <option value="1" {{ old('jenis_kelamin') == 1 ? 'selected="true"' : '' }}>
                                    Laki-laki</option>
                                <option value="2" {{ old('jenis_kelamin') == 2 ? 'selected="true"' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group{{ $errors->has('tempat_kematian') ? ' has-error' : '' }}">
                            <label for="tempat_kematian" class="col-md-4 control-label">Tempat Kematian</label>

                            <div class="col-md-12">
                                <input id="tempat_kematian" type="text" class="form-control" name="tempat_kematian"
                                    placeholder="Masukkan Tempat TPK ..." value="{{ old('tempat_kematian') }}" required>

                                @if ($errors->has('tempat_kematian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_kematian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('penyebab_kematian') ? ' has-error' : '' }}">
                            <label for="penyebab_kematian" class="col-md-4 control-label">Penyebab Kematian</label>

                            <div class="col-md-12">
                                <input id="penyebab_kematian" type="text" class="form-control" name="penyebab_kematian"
                                    placeholder="Masukkan Penyebab ..." value="{{ old('penyebab_kematian') }}" required>

                                @if ($errors->has('penyebab_kematian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penyebab_kematian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">SIMPAN</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--  @section('content')
    @include('layouts.components.alert')
    <div class="row">
        <div class="col">
            <div class="card bg-secondary shadow h-100">
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('penduduk.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group text-center">
                                    <label class="form-control-label" for="nik">Foto Penduduk</label> <br>
                                    <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image"
                                        style="max-height: 300px" src="{{ asset('storage/upload.jpg') }}" alt="">
                                    <input accept="image/*" onchange="uploadImage(this)" type="file" name="foto"
                                        class="images" style="display: none">
                                    @error('foto')
                                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6">
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-6">
                                        <label class="form-control-label" for="nik">NIK</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)"
                                            class="form-control @error('nik') is-invalid @enderror" name="nik"
                                            placeholder="Masukkan NIK ..." value="{{ old('nik') }}">
                                        @error('nik')
                                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-5 col-md-6">
                                        <label class="form-control-label" for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" placeholder="Masukkan Nama ..." value="{{ old('nama') }}">
                                        @error('nama')
                                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                            name="jenis_kelamin" id="jenis_kelamin">
                                            <option selected value="">Pilih Jenis Kelamin</option>
                                            <option value="1"
                                                {{ old('jenis_kelamin') == 1 ? 'selected="true"' : '' }}>Laki-laki</option>
                                            <option value="2"
                                                {{ old('jenis_kelamin') == 2 ? 'selected="true"' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <h4>Status Kepemilikan KTP</h4>
                                <div class="pl-4">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-control-label" for="ktp_elektronik">KTP Elektronik</label>
                                            <select class="form-control @error('ktp_elektronik') is-invalid @enderror"
                                                name="ktp_elektronik" id="ktp_elektronik">
                                                <option selected value="">Pilih KTP Elektronik</option>
                                                <option value="1"
                                                    {{ old('ktp_elektronik') == 1 ? 'selected="true"' : '' }}>Belum
                                                </option>
                                                <option value="2"
                                                    {{ old('ktp_elektronik') == 2 ? 'selected="true"' : '' }}>KTP-EL
                                                </option>
                                            </select>
                                            @error('ktp_elektronik')
                                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-control-label" for="status_rekam_id">Status Rekam</label>
                                            <select class="form-control @error('status_rekam_id') is-invalid @enderror"
                                                name="status_rekam_id" id="status_rekam_id">
                                                <option selected value="">Pilih Status Rekam</option>
                                                @foreach ($status_rekam as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('status_rekam_id') == $item->id ? 'selected="true"' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('status_rekam_id')
                                                <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-6">
                                <label class="form-control-label" for="kk">Nomor KK</label>
                                <input type="text" onkeypress="return hanyaAngka(event)"
                                    class="form-control @error('kk') is-invalid @enderror" name="kk"
                                    placeholder="Masukkan Nomor KK ..." value="{{ old('kk') }}">
                                @error('kk')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label class="form-control-label" for="status_hubungan_dalam_keluarga_id">Status Hubungan
                                    Dalam Keluarga</label>
                                <select
                                    class="form-control @error('status_hubungan_dalam_keluarga_id') is-invalid @enderror"
                                    name="status_hubungan_dalam_keluarga_id" id="status_hubungan_dalam_keluarga_id">
                                    <option selected value="">Pilih Status Hubungan Dalam Keluarga</option>
                                    @foreach ($status_hubungan_dalam_keluarga as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('status_hubungan_dalam_keluarga_id') == $item->id ? 'selected="true"' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('status_hubungan_dalam_keluarga_id')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label class="form-control-label" for="agama_id">Agama</label>
                                <select class="form-control @error('agama_id') is-invalid @enderror" name="agama_id"
                                    id="agama_id">
                                    <option selected value="">Pilih Agama</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('agama_id') == $item->id ? 'selected="true"' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('agama_id')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label class="form-control-label" for="status_penduduk_id">Status Penduduk</label>
                                <select class="form-control @error('status_penduduk_id') is-invalid @enderror"
                                    name="status_penduduk_id" id="status_penduduk_id">
                                    <option selected value="">Pilih Status Penduduk</option>
                                    @foreach ($status_penduduk as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('status_penduduk_id') == $item->id ? 'selected="true"' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('status_penduduk_id')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label class="form-control-label" for="etnis_atau_suku">Etnis/Suku</label>
                                <input type="text" class="form-control @error('etnis_atau_suku') is-invalid @enderror"
                                    name="etnis_atau_suku" placeholder="Masukkan Etnis/Suku ..."
                                    value="{{ old('etnis_atau_suku') }}">
                                @error('etnis_atau_suku')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection  --}}
