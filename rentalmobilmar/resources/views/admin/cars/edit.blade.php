@extends('layouts.admin')

@section('content')
   <div class="row">
    <div class="col-lg-8">
         <div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
            <div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Form Edit Data</div>
                <div class="card-body">
                    <form action="{{ route('admin.cars.update', $car->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <label style="color:#C3ACD0"for="nama_mobil">Nama Mobil</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="nama_mobil"class="form-control"value="{{ old('nama_mobil', $car->nama_mobil) }}"> </input>
                            </div>
                            
                            <div class="form-group">
                                <label style="color:#C3ACD0"for="harga_sewa">Harga Sewa</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="number" name="harga_sewa"class="form-control"value="{{ old('harga_sewa', $car->harga_sewa) }}"> </input>
                            </div>

                            <div class="form-group">
                                <label style="color:#C3ACD0"for="nomor_mobil">Nomor Mobil</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="nomor_mobil"class="form-control"value="{{ old('nomor_mobil', $car->nomor_mobil) }}"> </input>
                            </div>

                            <div class="form-group">
                                <label style="color:#C3ACD0"for="bahan_bakar">Bahan bakar</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="bahan_bakar"class="form-control"value="{{ old('bahan_bakar', $car->bahan_bakar) }}"> </input>
                            </div>

                            

                            <div class="form-group">
                                <label style="color:#C3ACD0"for="jumlah_kursi">Jumlah Kursi</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="number" name="jumlah_kursi"class="form-control"value="{{ old('jumlah_kursi', $car->jumlah_kursi) }}"> </input>
                            </div>
                            <div class="form-group">
                                <label  style="color:#C3ACD0" for="transmisi">Transmisi</label>
                                <select style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" id="transmisi" name="transmisi"class="form-control">
                                    <option {{ $car->transmisi == 'manual' ? 'selected' : null}}value="manual">Manual</option>
                                    <option {{ $car->transmisi == 'otomatis' ? 'selected' : null}}value="otomatis">Otomatis</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="color:#C3ACD0" for="status">Status</label>
                                <select style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" id="status" name="status"class="form-control">
                                    <option {{ $car->status == 'tersedia' ? 'selected' : null}} value="tersedia">Tersedia</option>
                                    <option {{ $car->status == 'terbooking' ? 'selected' : null}}value="terbooking">Terbooking</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="color:#C3ACD0" for="deskripsi">Deskripsi</label>
                                <textarea style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" id="deskripsi" name="deskripsi"class="form-control" cols="30"rows="5">{{old('deskripsi', $car->deskripsi)}}</textarea>
                            </div>
                    
                        <div class="form-group" >
                        <button style="background-color: rgb(159, 0, 128); color: white; border-radius: 20px; width: 100px;" type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 100px;height:42px" onclick="window.location.href='{{ route('admin.cars.index') }}'">Back</button>


                        </div>
                    
                    </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4" >
    <div class="card" style="background-color:rgb(0,0,0,0.85);border-radius:30px">
            <div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Form Edit Gambar</div>
                <div class="card-body">
                    <form action="{{ route('admin.cars.updateImage', $car->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <img src="{{ Storage::url($car->gambar)}}"class="img-fluid" alt="">
                        </div>
                        
                        <div class="form-group">
                            <label style="color:#C3ACD0"for="gambar">Gambar</label>
                            <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px;height:44px" type="file"class="form-control"name="gambar">
                        </div>
                        <div class="form-group">
                            <button style="background-color: rgb(159, 0, 128); color: white; border-radius: 20px; width: 100px;"    type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    
                    </form>
            </div>
        </div>
    </div>
   </div>
@endsection