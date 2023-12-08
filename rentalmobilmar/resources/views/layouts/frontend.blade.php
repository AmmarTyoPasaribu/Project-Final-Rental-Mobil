<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rental Mobil - Laravel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />
  </head>
  <body style="background-image: url('/img/gunung.jpeg');background-size:cover;background-repeat:no-repeat;background-attachment: fixed">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light"style="background-color:#1f041f">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-white" href="{{ route('homepage')}}"><span style='color:salmon'>MaR</span>ental</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
           
      
            <li class="nav-item">
              
                @if(Auth::check())
                <a class="nav-link text-white" href="{{ route('profile')}}">    Welcome, {{ Auth::user()->name }}</a>
                @else
                <a class="nav-link text-white" href="{{ route('login')}}"> Login</a>
                @endif
              
            </li>
            <li class="nav-item active">
    <a class="nav-link text-white" onclick="document.getElementById('logout-form').submit()" href="#">
        <i class="fas fa-envelope fa-fw"></i>
        <span>{{ Auth::check() ? "logout" : ''}}</span></a>
        <form id="logout-form" action="{{ route('logout') }}"method="post">
            @csrf
        </form>
</li>
<li class="nav-item">
              <a class="nav-link active text-white" href="{{ route('homepage')}}">Home</a>
            </li>
            
  
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
  @yield('content')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          MaRnevorget &copy; Here Boys
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
  </body>
</html>
