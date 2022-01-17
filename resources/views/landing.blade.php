<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PULLAHTA</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" />  
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/coming-soon.min.css') }}" rel="stylesheet">
</head>

<body>

  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{ asset('assets/mp4/bg2.mp4') }}" type="video/mp4">
  </video>

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto landing">
          <div class="masthead-content text-white py-5 py-md-0">
            <img src="{{ asset('img/logo-pemda.png') }}" style="width: 5rem;" class="mb-3">
            <h3 class="mb-3">Aplikasi <br />Pengumpulan Data</h3>
            <p class="mb-5 text-justify">Tata kelola data yang baik menunjang kualitas pembangunan. Aplikasi ini hadir untuk mendukung tata kelola data di Kabupaten Ciamis dan sebagai perwujudan misi kelima yaitu, “meningkatkan tata kelola pemerintahan yang efektif dan efisien.”</p>
            <div class="input-group input-group-newsletter">
              <!-- <input type="email" class="form-control" placeholder="Enter email..." aria-label="Enter email..." aria-describedby="submit-button"> -->
                <div class="input-group-append">
                    <button class="btn btn-secondary btn-sm" type="button" id="submit-button">Mohon login!</button>
                </div>
            </div>
            @if(session('error'))
              <p class="mb-5 text-justify">{{ session('error') }}</p>
            @endif
          </div>
        </div>
        <div class="col-12 my-auto login" style="display:none">
          <div class="masthead-content text-white py-5 py-md-0">
            <img src="{{ asset('img/logo-pemda.png') }}" style="width: 5rem;" class="mb-3">
            <h3 class="mb-3">Aplikasi <br />Pengumpulan Data</h3>
            <p class="mb-5 text-justify">Tata kelola data yang baik menunjang kualitas pembangunan. Aplikasi ini hadir untuk mendukung tata kelola data di Kabupaten Ciamis dan sebagai perwujudan misi kelima yaitu, “meningkatkan tata kelola pemerintahan yang efektif dan efisien.”</p>
            <form class="form-signin" method="post" action="{{ route('prosess.login') }}">
                @csrf
                <div class="input-group input-group-newsletter">
                  <input type="text" class="form-control" name="username" placeholder="Enter username..." aria-label="Enter email..." aria-describedby="submit-button" required>
                  <!-- <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="submit-button">Please login!</button>
                  </div> -->
                </div>
                <div class="input-group input-group-newsletter mt-4">
                  <input type="password" name="password" class="form-control" placeholder="Enter password..." aria-label="Enter email..." aria-describedby="submit-button" required>
                  <!-- <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="submit-button">Please login!</button>
                  </div> -->
                </div>
                <div class="input-group input-group-newsletter mt-4">
                  <!-- <input type="email" class="form-control" placeholder="Enter email..." aria-label="Enter email..." aria-describedby="submit-button"> -->
                  <div class="input-group-append">
                    <button class="btn btn-secondary sign-in btn-sm" type="submit">MASUK</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div> -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('assets/js/coming-soon.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click', '#submit-button', function(){
            $('.login').show()
            $('.landing').hide()
        })
    })
  </script>
  @stack('scripts')
</body>

</html>
