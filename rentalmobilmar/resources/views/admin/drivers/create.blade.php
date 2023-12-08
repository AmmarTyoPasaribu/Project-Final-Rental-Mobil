@extends('layouts.admin')

@section('content')
<div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
<div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Form Tambah Data</div>
        <div class="card-body">
            <form action="{{ route('admin.drivers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label style="color:#C3ACD0" for="nama_driver">Nama Driver</label>
                    <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="nama_driver"class="form-control"value="{{ old('nama_driver') }}"> </input>
                </div>

           
                <div class="form-group">
                    <label style="color:#C3ACD0" for="gender">Status</label>
                    <select style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" id="gender" name="gender"class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="terbooking">Terbooking</option>
                    </select>
                </div>

            <div class="form-group">
                <label style="color:#C3ACD0" for="gambar_sim">Gambar</label>
                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="file"class="form-control"name="gambar_sim">
            </div>
            <div class="form-group">
            <button style="background-color: rgb(159, 0, 128); color: white; border-radius: 20px; width: 100px;" type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 100px;height:42px" onclick="window.location.href='{{ route('admin.drivers.index') }}'">Back</button>


            </div>
          
            </form>
        </div>
    </div>
@endsection