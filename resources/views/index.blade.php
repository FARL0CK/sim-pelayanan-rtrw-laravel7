@extends('layouts.layout')
@section('title', 'Simpel RW/RT ' . $desa->nama_desa . ' - Beranda')

@section('styles')
    <meta name="description"
        content="Simpel RW/RT {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Melayani pembuatan surat keterangan secara online">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .animate-up:hover {
            top: -5px;
        }

        iframe {
            width: 100%;
            height: 300px;
        }
    </style>
@endsection

@section('content')
    @if (count($slide) > 0)
        <div id="slider" class="carousel slide mb-3" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slide as $key => $item)
                    <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}"
                        class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="wraper"></div>
                        <img src="{{ asset(Storage::url($item->gambar ?? 'noimage.jpg')) }}" class="slider"
                            alt="{{ $item->caption }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h4 class="font-weight-bold title-article block-with-text">{{ $item->judul }}</h4>
                            <div class="description-article block-with-text" style="font-size: 0.8rem">
                                {!! $item->konten !!}</div>
                        </div>
                    </a>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                @if (count($artikel) > 0)
                    <form class="shadow" class="mb-3" action="{{ URL::current() }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari ..."
                                value="{{ request('cari') }}">
                            <div class="input-group-append">
                                <button title="cari" type="submit" class="input-group-text" id="icon-cari"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    @foreach ($artikel as $item)
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-center mb-2">
                                        <a
                                            href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}">
                                            <img style="max-height: 200px" class="mw-100"
                                                src="{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}"
                                                alt="Gambar {{ $item->judul }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <a
                                            href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}">
                                            <h5 class="title-article block-with-text">{{ $item->judul }}</h5>
                                        </a>
                                        <div class="description-article block-with-text text-dark"
                                            style="font-size: 0.8rem">{!! $item->konten !!}</div>
                                        <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}"
                                            style="font-size: 0.8rem">Baca Selengkapnya ...</a>
                                        <div class="mt-2 d-flex justify-content-between text-muted"
                                            style="font-size: 0.8rem">
                                            <span>
                                                <i class="fas fa-clock"></i> {{ $item->created_at->diffForHumans() }}
                                            </span>
                                            <span>
                                                <i class="fas fa-eye"></i> {{ $item->dilihat }} Kali Dibaca
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $artikel->links('layouts.components.pagination') }}
                @endif
            </div>
            <div class="col-md-4 mb-3">
                @include('sidebar')
            </div>
        </div>
        @if (count($galleries) > 0)
            <section class="mb-5">
                <div class="row">
                    <div class="col-md">
                        <div class="header-body text-center mt-5 mb-3">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6 border-bottom">
                                    <h2 class="">GALLERY</h2>
                                    <p class="">Gallery Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah
                                        mengetahui gallery desa {{ $desa->nama_desa }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($galleries as $key => $item)
                        @if ($key < 6)
                            @if ($item->video_id)
                                <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                                    <a href="https://www.youtube.com/watch?v={{ $item->video_id }}" data-fancybox
                                        data-caption="{{ $item->caption }}">
                                        <i class="fas fa-play fa-2x" style="position: absolute; top:43%; left:46%;"></i>
                                        <img class="mw-100" src="{{ $item->gallery }}" alt="">
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                                    <a href="{{ url(Storage::url($item->gallery)) }}" data-fancybox
                                        data-caption="{{ $item->caption }}">
                                        <img class="mw-100" src="{{ url(Storage::url($item->gallery)) }}" alt="">
                                    </a>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                @if (count($galleries) > 6)
                    <div class="text-center">
                        <a href="{{ route('gallery') }}" class="btn btn-primary">Lebih Banyak Gallery</a>
                    </div>
                @endif
            </section>
        @endif

        <section class="mb-5">
            <div class="row">
                <div class="col-md">
                    <div class="header-body text-center mt-5 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 border-bottom">
                                <h2 class="">Lokasi</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31730.494686843234!2d107.02128234695927!3d-6.
        2225496009818855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698ec52c6e6dbf%3A0x7222e5e041776072!2sKarang
        satria%2C%20Kec.%20Tambun%20Utara%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1683728289582!5m2!1sid!2sid"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0"></iframe>
            </div>
        </section>

        <br>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/apbdes.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#slider').carousel({
                interval: 3000,
                touch: true,
            });

            $('#owl-one').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                smartSpeed: 900,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    400: {
                        items: 1
                    },
                    650: {
                        items: 1
                    },
                    660: {
                        items: 1
                    }
                }
            });

            $('#owl-two').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                smartSpeed: 900,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    400: {
                        items: 3
                    },
                    650: {
                        items: 3
                    },
                    660: {
                        items: 2
                    }
                }
            });
        });
    </script>
@endpush
