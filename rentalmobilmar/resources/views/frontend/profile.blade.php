@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background: rgb(50,18,59);
background: linear-gradient(0deg, rgba(50,18,59,1) 0%, rgba(51,18,60,1) 3%, rgba(71,20,68,1) 18%, rgba(133,29,88,1) 47%, rgba(104,11,108,1) 75%, rgba(31,4,31,1) 100%);">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
        <h1 style="font-weight: bolder;color: White;text-shadow: 4px 6px 6px rgb(5, 5, 5);" class="display-4 fw-bolder"><span style="color: salmon">Edit</span>Profile</h1>
          <p class="lead fw-normal text-white-50 mb-0">
          Yok Diedit Yok
          </p>
        </div>
      </div>
    </header>
    <section class="py-5">
    <div class="container mt-5">
    <div class="card"style="background-color:rgb(0,0,0,0.85);border-radius:30px">
    <div class="card-header d-flex justify-content-center" style="background-color:rgb(0,0,0,0.85);color:white;border-radius:30px">Edit Profile</div>
                <div class="card-body">
                    <form action="{{ route('updateprofile') }}" method="post">
                        @csrf
                        
                        <div class="form-group mt-4 p-2">
                                <label style="color:#C3ACD0" for="name">Nama</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="text" name="name" id="name" class="form-control"value="{{ Auth::user()->name }}"readonly> </input>
                            </div>
                            
                        <div class="form-group mt-4 p-2">
                                <label style="color:#C3ACD0" for="email">Email</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="email" name="email" id="email"  class="form-control"value="{{ Auth::user()->email }}"required> </input>
                            </div>

                        <div class="form-group mt-4 p-2">
                                <label style="color:#C3ACD0" for="password">Password</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="password" name="password" id="password" class="form-control"> <small class="text-muted">kosongkan klo gmau</small></input>
                            </div>

                        <div class="form-group mt-4 p-2">
                                <label style="color:#C3ACD0" for="password_confirmation">Confirm Password</label>
                                <input style="background-color:rgb(159,0,128,0.3);color:white;border-radius:20px" type="password" name="password_confirmation" id="password_confirmation" class="form-control"> <small class="text-muted">kosongkan klo gmau</small></input>
                            </div>


                    <div class="form-group mt-4 p-2">
                        <button style="background-color: rgb(159, 0, 128); color: white; border-radius: 20px; width: 100px;" type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" style="background-color: rgb(159, 0, 128,0.5); color: white; border-radius: 20px; width: 100px;height:42px" onclick="window.location.href='{{ route('homepage') }}'">Back</button>
                        </div>
                    
                    </form>
            </div>
        </div>
    
</section>
    @endsection