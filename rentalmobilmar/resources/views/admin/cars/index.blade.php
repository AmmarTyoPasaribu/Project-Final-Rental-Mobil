@extends('layouts.admin')

@section('content')
      <div class="card" style="background-color:rgb(0,0,0,0.85);border-radius:30px">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color:rgb(0,0,0,0.5);color:white;border-radius:30px">
            <h3>Daftar Mobil</h3>
            <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 150px;height:42px" onclick="window.location.href='{{ route('admin.cars.create') }}'">Tambah Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table table-bordered text-white">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Gambar Mobil</th>
                            <th>Harga Mobil</th>
                            <th>Status Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$car->nama_mobil }}</td>
                            <td>
                                <img src="{{ Storage::url($car->gambar) }}" width="150"alt="">
                            </td>
                            <td> {{$car->harga_sewa }}</td>
                            <td> {{$car->status }}</td>
                            <td>
                                <a href="{{ route ('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form onclick='return confirm("serius mo apus?");' class="d-inline" action="{{route ('admin.cars.destroy', $car->id) }}"method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td coldspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
@endsection




 



