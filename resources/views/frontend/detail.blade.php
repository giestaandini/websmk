@extends('frontend.layouts.app')
@push('styles')
<style>
    .image-container {
      position: relative;
      overflow: hidden;
    }

    .image-container img {
      display: block;
      width: 100%;
      height: 450px;
      object-fit: cover;
    }
</style>
@endpush

@section('contents')
<div style="background-color: #f8f9fa;">
  <div>
    <div class="image-container mb-5">
      <img src="{{ asset('storage/berita/' . $berita->foto) }}" class="d-block w-100" alt="gambar1" style="height: 400px; object-fit: cover;">
    </div>    
  </div>
</div>
<div class="py-3 px-5">
  <p class="h2 text-left">{{ $berita->judul }}</p>
  <p class="text-muted mt-3" style="font-size: 17px;">
    By {{ $berita->user->name }} &nbsp; | &nbsp;
    {{ $berita->updated_at->format('d M Y H:i') }}
  </p>
</div>
<div>
  <div class="container-fluid mb-5">
    <div class="row align-items-center">
      <div class="col-md-12 d-flex align-items-center" style="padding-left: 3rem;">
          <h5>
            {!! $berita->deskripsi !!}
          </h5>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
@endpush