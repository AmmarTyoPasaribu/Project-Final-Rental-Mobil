@extends('layouts.admin')

@section('content')

<div class="d-flex flex-row-reverse mt-4" >
<button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 150px;height:42px" onclick="window.location.href='{{ route('admin.drivers.create') }}'">Tambah Data</button>
</div>

<div class="row mt-3">
    @forelse($drivers as $driver)
        <div class="col-md-4 mb-4">
        <div class="card" style="border-radius: 15px;background-color:rgb(0,0,0,0.6);color:white;padding:4px">
              <!-- Sale badge-->
              <div
                class="badge badge-custom {{$driver-> gender =='tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                style="font-size:20px;top: 0; right: 0;border-radius: 15px;"
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
                <div>
                    <a href="{{ route('admin.drivers.edit', $driver->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form onclick='return confirm("serius mo apus?");' class="d-inline" action="{{ route('admin.drivers.destroy', $driver->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class='btn btn-danger btn-sm'>Delete</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
    @empty
        <p>No Driver Available.</p>
    @endforelse
</div>

@endsection



