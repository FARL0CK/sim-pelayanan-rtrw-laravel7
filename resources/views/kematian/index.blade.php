@extends('layouts.app')

@section('title', 'Kematian')

@section('styles')
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content-header')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
        style="background-image: url({{ asset('/img/cover-bg-profil.jpg') }}); background-size: cover; background-position: center top;">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <div class="card shadow h-100">
                        <div class="card-header border-0">
                            <div
                                class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                                <div class="mb-3">
                                    <h2 class="mb-0">Kematian</h2>
                                    <p class="mb-0 text-sm">Kelola Kematian</p>
                                </div>
                                <div class="mb-3">
                                    {{--  <a target="_blank" href="{{ route('penduduk.print_all') }}" data-toggle="tooltip"
                                        class="mb-1 btn btn-secondary" title="Cetak"><i class="fas fa-print"></i></a>  --}}
                                    <a href="{{ route('kematian.create') }}?page={{ request('page') }}"
                                        data-toggle="tooltip" class="mb-1 btn btn-success" title="Tambah Data Kematian"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
                    <div class="card card-stats shadow h-100">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Kematian</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ App\Kematian::count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
                    <div class="card card-stats shadow h-100">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kematian Laki-laki</h5>
                                    <span
                                        class="h2 font-weight-bold mb-0">{{ App\Kematian::where('jenis_kelamin', 1)->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
                    <div class="card card-stats shadow h-100">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kematian Perempuan</h5>
                                    <span
                                        class="h2 font-weight-bold mb-0">{{ App\Kematian::where('jenis_kelamin', 2)->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@section('form-search')
    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto"
        action="{{ URL::current() }}" method="GET">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Cari ...." type="serach" name="cari"
                    value="{{ request('cari') }}">
            </div>
        </div>
    </form>
@endsection

@section('form-search-mobile')
    <form class="mt-4 mb-3 d-md-none" action="{{ URL::current() }}" method="GET">
        <div class="input-group input-group-rounded input-group-merge">
            <input type="search" name="cari" class="form-control form-control-rounded form-control-prepended"
                placeholder="cari" aria-label="Search" value="{{ request('cari') }}">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-search"></span>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('content')
    @include('layouts.components.alert')
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped table-bordered">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Opsi</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Tempat Kematian</th>
                        <th class="text-center">Penyebab Kematian</th>
                        <th class="text-center">Tanggal Kematian</th>
                    </thead>
                    <tbody>
                        @forelse ($kematian as $kematian)
                            <tr>
                                <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle">
                                    <a href="{{ route('kematian.edit', $kematian->id) }}" class="btn btn-sm btn-success"
                                        data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>


                                    <form action="{{ route('kematian.destroy', $kematian->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger "><i
                                                class="fas fa-trash"></i></button>
                                    </form>

                                </td>
                                <td style="vertical-align: middle">{{ $kematian->nama }}</td>
                                <td style="vertical-align: middle">
                                    {{ $kematian->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td style="vertical-align: middle">{{ $kematian->tempat_kematian ?? '-' }}</td>
                                <td style="vertical-align: middle">{{ $kematian->penyebab_kematian ?? '-' }}</td>
                                <td style="vertical-align: middle">
                                    {{ $kematian->tanggal_kematian }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="17" align="center">Data tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('layouts.components.hapus', ['nama_hapus' => 'kematian'])

@endsection
