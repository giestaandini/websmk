@extends('backend.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Berita Sekolah</h1>
    </div>

    <div class="table-responsive col-lg-10">
      <a href="{{ route('beritaback.create') }}" class="btn btn-primary mb-3">Berita Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($berita->count() > 0)
                @foreach ($berita as $gl)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gl->judul }}</td>
                <td>{{ $gl->kategori->name }}</td>
                <td class="d-flex gap-1">
                  <a href="{{ route('beritaback.show', $gl->id) }}" class="badge bg-info"><span data-feather="eye"></span></a>
                  <a href="{{ route('beritaback.edit', $gl->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                  <form action="{{ route('beritaback.destroy', $gl->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin Ingin Menghapus Berita Ini?')">
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