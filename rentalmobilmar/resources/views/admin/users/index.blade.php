@extends('layouts.admin')

@section('content')
<div class="card" style="background-color:rgb(0,0,0,0.85);border-radius:30px">
<div class="card-header d-flex justify-content-between align-items-center" style="background-color:rgb(0,0,0,0.5);color:white;border-radius:30px">
            <h3>Daftar Mobil</h3>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table table-bordered text-white">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>pass</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        @if ($user->is_admin == 0)
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$user->name }}</td>
                            <td> {{$user->email }}</td>
                            <td> {{$user->password }}</td>
                            
                            <td>
                        
                                <form onclick='return confirm("serius mo apus?");' class="d-inline" action="{{route ('admin.users.destroy', $user->id) }}"method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
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




 



