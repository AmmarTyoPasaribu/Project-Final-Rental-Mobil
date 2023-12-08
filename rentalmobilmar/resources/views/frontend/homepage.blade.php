@extends('layouts.frontend')

@section('content')
<!-- <style>
    
    .custom-input::placeholder {
        color: white; 
    }

</style> -->
<header class="py-5" style="background: rgb(50,18,59);background: linear-gradient(0deg, rgba(50,18,59,1) 0%, rgba(51,18,60,1) 3%, rgba(71,20,68,1) 18%, rgba(133,29,88,1) 47%, rgba(104,11,108,1) 75%, rgba(31,4,31,1) 100%);">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 style="font-weight: bolder;color: White;text-shadow: 4px 6px 6px rgb(5, 5, 5);" class="display-4 fw-bolder"><span style="color: salmon">MaR</span>ental</h1>
          <p class="lead fw-normal text-white-50 mb-0">
            Rental Dengan Berbagai Keunikan
          </p>
        </div>
      </div>
      
<div class="a d-flex justify-content-center">
  <div class="d-flex"style="justify-content: space-between;">
    <form action="{{ route('homepage') }}">
      <div class="input-group mb-3">
          <input style="background-color:rgb(159,0,128,0.3);color:white;border:none;" type="text" class="form-control custom-input" placeholder="Cari Nama"name="search">
             <div class="input-group-append"style="margin-right:15px">
               <button style="background-color:rgb(0,0,50);color:white;border:none" class="btn btn-outline-secondary btn-danger" type="submit">Cari</button>
            </div>
      </div>
  </form>
  <form action="{{ route('homepage') }}">
    <div class="input-group mb-3">
        <select style="background-color:rgb(159,0,128,0.3);color:white;border:none" class="form-control" name="searcha">
        <option disabled selected>Cari Status</option>
            <option value="tersedia">Tersedia</option>
            <option value="terbooking">Terbooking</option>
        </select>
        <div class="input-group-append">
            <button style="background-color:rgb(0,0,50);color:white;border:none" class="btn btn-outline-secondary btn-danger" type="submit">Cari</button>
        </div>
    </div>
</form>

  </div>
</div>
    </header>
    <!-- Section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <h3 style="text-shadow: 3px 3px 3px rgb(255, 255, 255);color:black;font-size:60px;" class="text-center display-6 fw-bolder mb-5">Daftar Mobil</h3>
        <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" >
          @foreach($cars as $car)
          <div class="col mb-5">
          <div class="card" style="border-radius: 15px;background-color:rgb(0,0,0,0.6);color:white;padding:4px">
              <!-- Sale badge-->
              <div
                class="badge badge-custom {{$car-> status =='tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                style="top: 0; right: 0;border-radius: 15px;"
              >
                {{ $car->status }}
              </div>
              <!-- Product image-->
              <img style="border-radius: 15px;"
                class="card-img-top"
                src="{{Storage::url($car->gambar)}} "
                alt=""
              />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{$car->nama_mobil}}</h5>
                  <!-- Product price-->
                  <div class="rent-price mb-3">
                    <span class="text-primary"> US${{number_format($car->harga_sewa)}}/</span>second
                  </div>
                  <ul class="list-unstyled list-style-group">
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Bahan bakar</span>
                      <span style="font-weight: 600">{{$car->bahan_bakar}}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Jumlah Kursi</span>
                      <span style="font-weight: 600">{{$car->jumlah_kursi}}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Transmisi</span>
                      <span style="font-weight: 600">{{$car->transmisi}}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
              @if ($car->status == 'tersedia')
                <div class="text-center">
                <!-- {{ route('contacta', $car->slug)}} -->
                
                  <a style="background: rgb(47,32,51);
background: linear-gradient(0deg, rgba(47,32,51,1) 0%, rgba(167,85,143,1) 100%);"class="btn text-white mt-auto" href="{{ Auth::check() ? route('contacta', $car->slug) : route('login') }}">Rental  </a>
                  <a style="background: rgb(167,85,143);
background: linear-gradient(0deg, rgba(167,85,143,1) 0%, rgba(47,32,51,1) 100%)";
                    class="btn mt-auto text-white"
                    href="{{ Auth::check() ? route('detail', $car->slug) : route('login') }}"
                    >Detail</a
                  >
                </div>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>


    <!-- //////////// -->

    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <h3 class="text-center display-6 fw-bolder mb-5"style="font-size:60px;text-shadow: 3px 3px 3px rgb(255, 255, 255);color:black;"class="text-center display-6 fw-bolder mb-5">Daftar Supir</h3>
        <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" >
          @foreach($drivers as $driver)
          <div class="col mb-5">
          <div class="card" style="border-radius: 15px;background-color:rgb(0,0,0,0.6);color:white;padding:4px">
              <!-- Sale badge-->
              <div
                class="badge badge-custom {{$driver-> gender =='tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                style="top: 0; right: 0;border-radius: 15px;"
              >
                {{ $driver->gender }}
              </div>
              <!-- Product image-->
              <img style="border-radius: 15px;"
                class="card-img-top"
                src="{{Storage::url($driver->gambar_sim)}} "
                alt=""
              />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{$driver->nama_driver}}</h5>
                  <!-- Product price-->
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    @if(Auth::check())          
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center display-6 fw-bolder mb-5" style="font-size:60px;text-shadow: 3px 3px 3px rgb(255, 255, 255);color:black;" class="text-center display-6 fw-bolder mb-5">Daftar Pinjaman {{ Auth::user()->name }}</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($users as $user)
                @foreach($cars as $car)   
                    @foreach($bayars as $bayar)
                    @if ($car->status == 'terbooking' && $user->name == $bayar->namaku && Auth::user()->name == $bayar->namaku && $car->nama_mobil == $bayar->mobilrental)
                                <div class="col mb-5">
                                    <div class="card" style="border-radius: 15px;background-color:rgb(0,0,0,0.6);color:white;padding:4px">
                                        <!-- Sale badge-->
                                        <div class="badge badge-custom {{$car->status =='tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute" style="top: 0; right: 0;border-radius: 15px;">
                                            {{ $car->status }}
                                        </div>
                                        <!-- Product image-->
                                        <img style="border-radius: 15px;" class="card-img-top" src="{{Storage::url($car->gambar)}}" alt="" />
                                        <!-- Product details-->
                                        <div class="card-body card-body-custom pt-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">{{$car->nama_mobil}}</h5>
                                                <!-- Product price-->
                                                <div class="rent-price mb-3">
                                                    <span class="text-primary"> US${{number_format($car->harga_sewa)}}/</span>second
                                                </div>
                                                <ul class="list-unstyled list-style-group">
                                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                                        <span>Bahan bakar</span>
                                                        <span style="font-weight: 600">{{$car->bahan_bakar}}</span>
                                                    </li>
                                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                                        <span>Jumlah Kursi</span>
                                                        <span style="font-weight: 600">{{$car->jumlah_kursi}}</span>
                                                    </li>
                                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                                        <span>Transmisi</span>
                                                        <span style="font-weight: 600">{{$car->transmisi}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endif







@if(Auth::check())          
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center display-6 fw-bolder mb-5" style="font-size:60px;text-shadow: 3px 3px 3px rgb(255, 255, 255);color:black;" class="text-center display-6 fw-bolder mb-5">Daftar Driver {{ Auth::user()->name }}</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($users as $user)
                   @foreach($cars as $car)   
                       @foreach($bayars as $bayar)
                           @foreach($drivers as $driver)
                              @if ($driver->gender == 'terbooking' && $user->name == $bayar->namaku && Auth::user()->name == $bayar->namaku && $car->nama_mobil == $bayar->mobilrental && $driver->nama_driver == $bayar->driverrental)
                                  <div class="col mb-5">
                                    <div class="card" style="border-radius: 15px;background-color:rgb(0,0,0,0.6);color:white;padding:4px">
                                        <!-- Sale badge-->
                                        <div
                                          class="badge badge-custom {{$driver-> gender =='tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                                          style="top: 0; right: 0;border-radius: 15px;"
                                        >
                                          {{ $driver->gender }}
                                        </div>
                                        <!-- Product image-->
                                        <img style="border-radius: 15px;"
                                          class="card-img-top"
                                          src="{{Storage::url($driver->gambar_sim)}} "
                                          alt=""
                                        />
                                        <!-- Product details-->
                                        <div class="card-body card-body-custom pt-4">
                                          <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{$driver->nama_driver}}</h5>
                                            <!-- Product price-->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                            
                              @endif
                           @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection