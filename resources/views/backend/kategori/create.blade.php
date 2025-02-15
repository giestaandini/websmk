@extends('backend.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori</h1>
    </div>

    <div class="col-lg-8">
      <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
              <label for="title" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
              @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <button type="submit" class="btn btn-primary">Tambah Kategori</button>
      </form>
  </div>
@endsection