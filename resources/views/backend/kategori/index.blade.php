@extends('backend.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Berita</h1>
    </div>

    <div class="table-responsive col-lg-9">
      <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Kategori Baru</a>
      @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('success') }}
        </div>
      @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kategori Berita</th>
              <th scope="col">Jumlah Berita</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($kategori->count() > 0)
              @foreach ($kategori as $kt)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kt->name }}</td>
                  <td>{{ $kt->jumlah_berita }}</td>
                  <td class="d-flex gap-1">
                    <form action="{{ route('kategori.destroy', $kt->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin Ingin Menghapus Kategori Berita Ini?')">
                        <span data-feather="x-circle"></span>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
@endsection