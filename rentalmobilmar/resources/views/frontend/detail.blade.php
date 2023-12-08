@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background: rgb(50,18,59);background: linear-gradient(0deg, rgba(50,18,59,1) 0%, rgba(51,18,60,1) 3%, rgba(71,20,68,1) 18%, rgba(133,29,88,1) 47%, rgba(104,11,108,1) 75%, rgba(31,4,31,1) 100%);">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
        <h1 style="font-weight: bolder;color: White;text-shadow: 4px 6px 6px rgb(5, 5, 5);" class="display-4 fw-bolder"><span style="color: salmon">Detail</span>Mobil</h1>
        <p class="lead fw-normal text-white-50 mb-0">
            Detailin nih
          </p>
      </div>
      </div>
    </header>
    <!-- Section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-8 mb-5">
          <div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
              <!-- Product image-->
              <img
                class="card-img-top"
                src="{{Storage::url($car->gambar)}}"
                alt="..."
              style="background-color:rgb(0,0,0,0.85);border-radius:30px">
              
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div>
                  <!-- Product name-->
                  <h3 style="color:#C3ACD0" class="fw-bolder">Deskripsi</h3>
                  <p style="color:white">
                  {{ $car->deskripsi }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
          <div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <h5  style=color:white class="fw-bolder">{{$car->nama_mobil}}</h5>
                    <div class="rent-price mb-3">
                      <span style="font-size: 1rem" class="text-primary"
                        >Rp.{{number_format($car->harga_sewa)}}/</span
                      >second
                    </div>
                  </div>
                  <ul class="list-unstyled list-style-group">
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span style="color:white">Bahan Bakar</span>
                      <span  style=color:white>{{$car->bahan_bakar}}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span style="color:white">Jumlah Kursi</span>
                      <span style="font-weight: 600;color:white">{{$car->jumlah_kursi}}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span style="color:white">Transmisi</span>
                      <span style="font-weight: 600;color:white">{{$car->transmisi}}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
             
                  <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 320px;height:42px" onclick="window.location.href='{{ route('contacta', $car->slug)}}'">Rental</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection