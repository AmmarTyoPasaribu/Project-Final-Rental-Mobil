@extends('layouts.admin')

@section('content')
<div class="card" style="background-color:rgb(0,0,0,0.85);border-radius:30px">
<div class="card-header d-flex justify-content-between align-items-center" style="background-color:rgb(0,0,0,0.5);color:white;border-radius:30px">
            <h3>Daftar Bayar</h3>
            <!-- <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 150px;height:42px" onclick="window.location.href='{{ route('admin.bayars.create') }}'">Tambah Data</button> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table table-bordered text-white">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar SimKtpBukti</th>
                            <th>Mobil</th>
                            <th>Driver</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bayars as $bayar)
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$bayar->namaku }}</td>
                            <td>
                                <img src="{{ Storage::url($bayar->bukti) }}" width="150"alt="">
                            </td>
                            <td> {{$bayar->mobilrental }}</td>
                            <td> {{$bayar->driverrental }}</td>
                            <td>
                                <!-- <a href="{{ route ('admin.bayars.edit', $bayar->id) }}" class="btn btn-sm btn-warning">Edit</a> -->
                                <form onclick='return confirm("serius mo apus?");' class="d-inline" action="{{route ('admin.bayars.destroy', $bayar->id) }}"method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                                
            @forelse($cars as $car)
                @if ($car->nama_mobil == $bayar->mobilrental)
                    @if ($car->status == 'tersedia')
                    
                        <form class="d-inline"action="{{ route('admin.bayars.updateStatus', $car->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Car Tersedia</button>
                        </form>
                    @else
                        
                        <form class="d-inline"action="{{ route('admin.bayars.updateStatus', $car->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Car Terbooking</button>
                        </form>
                    @endif
                @endif
            @empty
                Data Mobil Tidak Ditemukan
            @endforelse



            @forelse($drivers as $driver)
                @if ($driver->nama_driver == $bayar->driverrental)
                    @if ($driver->gender == 'tersedia')
                        <form action="{{ route('admin.bayars.updateStatusDriver', $driver->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Driver Tersedia</button>
                        </form>
                    @else
                        <form action="{{ route('admin.bayars.updateStatusDriver', $driver->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Driver Terbooking</button>
                        </form>
                    @endif
                @endif
            @empty
                Data Driver Tidak Ditemukan
            @endforelse



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




 



