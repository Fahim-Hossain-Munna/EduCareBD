<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="{{ asset('frontend/assets') }}/images/neptune.png">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- google fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        {{-- social icon css --}}
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />
        {{-- social icon css --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/responsive.css">
  <title>EduCare BD</title>
</head>

<body>
  <!-- navigation part start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="logo">
          <a href="#"> <img src="{{ asset('frontend/assets') }}/images/neptune.png" alt="logo_icon"> EduCare <span>BD</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="links">
          <div class="nav-items collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#student-comment">Comments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#feedback">Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('write.generate.view') }}">Any Query</a>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> -->
            </ul>
            @auth
            <div class="btn-group">
              <button type="button" class="btn btn-primary position-relative btn-sm dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}<span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                    <li class="d-flex justify-content-center"><button class="nav-link text-white btn btn-danger btn-sm m-1">LOGOUT</button></li>
                </form>
              </ul>
            </div>
            @else
            <form class="d-flex">
              <a href="{{ route('student.registration.index') }}" class="btn btn-outline-success sign-up" type="submit">Sign up</a>
            </form>
            @endauth
          </div>
        </div>
    </div>
  </nav>

  <!-- navigation part end -->

  @yield('front_content')

    <!-- FOOTER part start -->
    <footer>
        <div class="container">
            <div class="footer-start">
              <div class="logo">
                <a href="#"> <img src="{{ asset('frontend/assets') }}/images/neptune.png" alt="logo_icon"> EduCare <span>BD</span></a>
              </div>
               <div class="icons">
                <div class="d-flex justify-content-end">
                    <div id="sharebottom"></div>
                </div>
               </div>

            </div>
        </div>
      </footer>
      <!-- FOOTER part end -->

    <!-- JQuery Script tag start -->
    <script src="{{ asset('frontend/assets') }}/js/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- social icon js --}}
    <script src="https://kit.fontawesome.com/7368c40b21.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    {{-- social icon js --}}
    @yield('script_content')
    <script>
        $("#sharebottom").jsSocials({
          url: "https://github.com/Fahim-Hossain-Munna",
          text: "Support Our EduCare BD",
          showLabel: true,
          shares: [
            "email",
            { share: "facebook", label: "Like our Page" },
            { share: "whatsapp", label: "Send a Message" },
          ],
        });
    </script>
    <script src="{{ asset('frontend/assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/script.js"></script>
    <!-- JQuery Script tag end -->

  </body>

  </html>
