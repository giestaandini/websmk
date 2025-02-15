@extends('backend.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Berita Sekolah</h1>
    </div>

    <div class="col-lg-8">
        <form action="{{ route('beritaback.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required value="{{ $berita->judul }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-label" id="deskripsi" rows="5" name="deskripsi">{{ $berita->deskripsi }}</textarea>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori Berita</label>
                <select class="form-select" name="kategori_id">
                  @foreach ($kategori as $kt)
                    <option value="{{ $kt->id }}" {{ $berita->kategori_id == $kt->id ? 'selected' : '' }}>
                      {{ $kt->name }}
                    </option>
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" name="status" required>
                <option value="draft" {{ $berita->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $berita->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $berita->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Post Image</label>
            @if ($berita->foto)
                <img src="{{ asset('storage/berita/' . $berita->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

            <button type="submit" class="btn btn-primary">Edit Berita</button>
        </form>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>

@endsection
