@extends('layouts.admin')

@section('content')
   <div class="row">
    <div class="col-lg-8">
         <div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
         <div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Form Edit Data</div>
                <div class="card-body">
                    <form action="{{ route('admin.drivers.update', $driver->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <label style="color:#C3ACD0" for="nama_driver">Nama Driver</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="nama_driver"class="form-control"value="{{ old('nama_driver', $driver->nama_driver) }}"> </input>
                            </div>
                            

  

                            <div class="form-group">
                                <label style="color:#C3ACD0" for="gender">Status</label>
                                <select style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" id="gender" name="gender"class="form-control">
                                    <option {{ $driver->gender == 'tersedia' ? 'selected' : null}} value="tersedia">Tersedia</option>
                                    <option {{ $driver->gender == 'terbooking' ? 'selected' : null}}value="terbooking">Terbooking</option>
                                </select>
                            </div>
                        <div class="form-group">
                        <button style="background-color: rgb(159, 0, 128); color: white; border-radius: 20px; width: 100px;" type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 100px;height:42px" onclick="window.location.href='{{ route('admin.drivers.index') }}'">Back</button>
                        </div>
                    
                    </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
    <div class="card" style="background-color:rgb(0,0,0,0.85);border-radius:30px">
            <div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Form Edit Gambar</div>
                <div class="card-body">
                    <form action="{{ route('admin.drivers.updateImage', $driver->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <img src="{{ Storage::url($driver->gambar_sim)}}"class="img-fluid" alt="">
                        </div>
                        
                        <div class="form-group">
                            <label style="color:#C3ACD0" for="gambar_sim">Gambar</label>
                            <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px;height:44px" type="file"class="form-control"name="gambar_sim">
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