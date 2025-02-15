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

    .fasilitas-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .fasilitas-wrapper > div {
      flex: 1 1 250px;
      max-width: 400px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 35px;
      background: #fff;
    }

    .custom-shadow {
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.548);
    }

  .garis-bawah {
      width: 150px; 
      height: 5px;
      background-color: #EFB036;
      margin-top: 10px;
      border-radius: 3px;
    }
</style>
@endpush

@section('contents')
<div style="background-color: #f8f9fa;">
  <div>
    <div class="image-container">
      <img src="{{ asset('image/profil.jpg') }}" class="d-block w-100" alt="gambar1" style="height: 400px; object-fit: cover;">
      <div class="overlay">
        <div class="text-overlay">
          <h2>SMK SAKTI GEMOLONG</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis facilis autem error, dolor inventore iure mollitia quos eos excepturi voluptate repellendus, voluptatem et nesciunt. Perspiciatis deleniti sit dicta ut ipsam expedita magni, doloribus non. Delectus error reprehenderit necessitatibus aut nisi.</p>
        </div>
      </div>
    </div>    
  </div>
</div>
<div>
  <div class="fasilitas-wrapper">
    <div style="background-color: #EFB036; color:#f8f9fa;">
      <div class="icon" style="font-size: 2rem;">📚</div>
      <h3>Ruang Kelas Modern</h3>
      <p>Dilengkapi Dengan Teknologi Pembelajaran Digital.</p>
    </div>
    <div style="background-color: #f8f9fa;">
      <div class="icon" style="font-size: 2rem;">🔬</div>
      <h3>Laboratorium</h3>
      <p>Sains, komputer, dan bahasa yang lengkap.</p>
    </div>
    <div style="background-color: #f8f9fa;">
      <div class="icon" style="font-size: 2rem;">📖</div>
      <h3>Perpustakaan</h3>
      <p>Koleksi buku dan media pembelajaran terkini.</p>
    </div>
    <div style="background-color: #f8f9fa;">
      <div class="icon" style="font-size: 2rem;">🏀</div>
      <h3>Area Olahraga & Seni</h3>
      <p>Mendukung kegiatan ekstrakurikuler.</p>
    </div>
  </div>
</div>
<div>
  <div class="container-fluid mb-4 py-5 px-5">
    <div class="row align-items-center">
      <div class="col-md-4 d-flex align-items-center" style="padding-left: 3rem;">
        <p class="text">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis nisi reprehenderit eius amet expedita voluptatum, magni tempora fuga animi, culpa dignissimos quaerat ducimus assumenda similique laudantium consequuntur enim accusantium recusandae.
        </p>
      </div>
      <div class="col-md-8 d-flex align-items-center" style="padding-left: 3rem;">
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum nam iure nemo facere magni ipsam corporis inventore temporibus iusto repellat vel doloremque voluptatibus doloribus tempora est consectetur voluptates mollitia et, repellendus nostrum esse! Assumenda voluptates dolorum rerum quidem incidunt. Cum assumenda nemo molestiae, excepturi blanditiis quas! Perferendis, corporis deserunt? Nostrum at, reprehenderit hic ab error tempore sunt voluptatem, officia earum voluptate labore temporibus, accusamus amet magnam sint velit mollitia laudantium distinctio quibusdam! Unde, pariatur alias. Natus, dicta quia itaque excepturi aut obcaecati quas odit quam alias, est omnis repellat aliquid. Natus nemo inventore accusamus.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="py-5" style="background-color: #4C7B8B;">
  <p class="h1 text-center" style="color: #f8f9fa;">Berita Terbaru</p>
  <div class="garis-bawah mx-auto"></div>
</div>
<div class="py-3 px-5" style="background-color: #4C7B8B; border-shadow: 10px;">
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
@endsection

@push('scripts')
@endpush