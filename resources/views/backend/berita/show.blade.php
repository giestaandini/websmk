@extends('backend.layouts.main')

@section('container')

    <div class="container">
        <div class="row my-3">
            <div class="col-lg-10">
                <h1 class="mb-3">{{ $berita->judul }}</h1>
                <p class="text-muted" style="font-size: 18px;">
                  By {{ $berita->user->name }} &nbsp; | &nbsp;
                  {{ $berita->updated_at->format('d M Y H:i') }}
                </p>

                <a href="{{ route('beritaback') }}" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>

                @if ($berita->foto)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/berita/' . $berita->foto) }}" class="img-fluid mt-3">
                </div>
                @endif

                <article class="my-3 fs-5">
                    {!! $berita->deskripsi !!}
                </article>
            </div>
        </div>
    </div>

@endsection