@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background: rgb(50,18,59);
background: linear-gradient(0deg, rgba(50,18,59,1) 0%, rgba(51,18,60,1) 3%, rgba(71,20,68,1) 18%, rgba(133,29,88,1) 47%, rgba(104,11,108,1) 75%, rgba(31,4,31,1) 100%);">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
        <h1 style="font-weight: bolder;color: White;text-shadow: 4px 6px 6px rgb(5, 5, 5);" class="display-4 fw-bolder"><span style="color: salmon">Detail</span>Mobil</h1>
          <p class="lead fw-normal text-white-50 mb-0">
          Yok Dirental Yok
          </p>
        </div>
      </div>
    </header>

    <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
    <div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                       
                    </div>
                @endif
        
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Form Rental Mobil</div>
        <div class="card-body">
        <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-4 p-2">
                    <label style="color:#C3ACD0" for="namaku">Username</label>
                    <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="namaku"class="form-control"value="{{ Auth::user()->name }}"readonly> </input>
                </div>

                <div class="form-group mt-4 p-2">
                    <label style="color:#C3ACD0" for="mobilrental">Mobil yang mau dirental</label>
                    <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text"value="{{$car->nama_mobil}}" name="mobilrental"class="form-control"readonly> </input>
                </div>
                
                <div class="form-group mt-4 p-2">
                    <label style="color:#C3ACD0" for="driverrental">Driver</label>
                    <select style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" name="driverrental" class="form-control">
                        
                        <option>Tidak Pakai Driver</option>
                        @forelse($drivers as $driver)
                        
                            @if ($driver->gender == 'tersedia')
                                <option>{{ $driver->nama_driver }}</option>
                            @endif
                        @empty
                            <option disabled>Data Mobil Tidak Ditemukan</option>
                        @endforelse
                    </select>
                </div>


                <div class="form-group mt-4 p-2">
                <label style="color:#C3ACD0" for="bukti">Gambar bukti(Satukan Ktp, sim, nota transfer pembayaran)</label>
                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px;" type="file"class="form-control"name="bukti">
            </div>
            <div class="form-group mt-4">
            <button style="background-color: rgb(159, 0, 128); color: white; border-radius: 20px; width: 100px;" type="submit" class="btn btn-primary">Simpan</button>
            </div>
          
            </form>
        </div>
    </div>
    </div>
    </section>
@endsection





                <!-- <div class="form-group">
                    <label for="mobilrental">Mobil yang mau dirental</label>
                    <input type="text"value="{{$car->nama_mobil}}" name="mobilrental"class="form-control"readonly> </input>
                </div> -->



