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
      transition: transform 0.3s ease, filter 0.3s ease;
    }

    .image-container:hover img {
      transform: scale(1.05);
      filter: brightness(50%);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      text-align: left;
      padding: 20px;
    }

    .text-overlay {
      background: rgba(255, 255, 255, 0.8);
      color: black;
      padding: 15px 30px;
      border-radius: 10px;
      max-width: 40%;
      font-size: 1.2rem;
      text-align: left; 
      margin-left: 50px; 
    }

    .text-overlay h2 {
      margin: 0 0 10px;
      font-size: 2rem;
      font-weight: bold;
    }

    .text-overlay p {
      margin: 5px 0;
      font-size: 1rem;
    }

    .image-container:hover .text-overlay {
      opacity: 1;
    }

    .custom-shadow {
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.548);
    }
</style>
@endpush

@section('contents')
<div style="background-color: #f8f9fa;">
  <div>
    <div class="image-container">
      <img src="{{ asset('image/sekolah.jpg') }}" class="d-block w-100" alt="gambar1" style="height: 400px; object-fit: cover;">
      <div class="overlay">
        <div class="text-overlay">
          <h2>SMK SAKTI GEMOLONG</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis facilis autem error, dolor inventore iure mollitia quos eos excepturi voluptate repellendus, voluptatem et nesciunt. Perspiciatis deleniti sit dicta ut ipsam expedita magni, doloribus non. Delectus error reprehenderit necessitatibus aut nisi.</p>
        </div>
      </div>
    </div>    
  </div>
</div>
<div class="py-5 px-5">
  <div class="row justify-content-center">
    @foreach ($berita as $br)
    <div class="col-md-3 mb-4 d-flex">
      <div class="card custom-shadow" style="height: 100%; display: flex; flex-direction: column;">
        <a href="{{ route('detail', $br->id) }}">
          <div class="position-relative">
            <img src="{{ asset('storage/berita/' . $br->foto) }}" alt="" class="card-img-top" style="height: 200px; object-fit: cover;">
          </div>
        </a>
        <div class="card-body">
          <p class="text-muted" style="font-size: 14px;">
            By {{ $br->user->name }}
          </p>
          <a href="{{ route('detail', $br->id) }}" class="card-text" style="color: black; font-family: 'Poppins', sans-serif; font-size: 16px; text-decoration: none;">
            {!! Str::words($br->deskripsi, 30, '...') !!}
          </a>
          <p class="text-muted mt-2" style="font-size: 14px;">
            {{ $br->updated_at->format('d M Y H:i') }}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="d-flex justify-content-center mt-4">
  {{ $berita->links() }}
</div>  
@endsection

@push('scripts')
@endpush