
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>EduCare BD - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('backend') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="{{ asset('backend') }}/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Theme Styles -->
    <link href="{{ asset('backend') }}/assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend') }}/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="{{ route('dashboard') }}" class="logo-icon"><span class="logo-text">EduCare</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        @if (auth()->user()->user_photo)

                        <img src="{{ asset('backend/uploads/user_photo') }}/{{ auth()->user()->user_photo }}" class="overflow-hidden rounded-circle">
                        @else
                        {{-- <img src="https://www.seekpng.com/png/detail/73-730482_existing-user-default-avatar.png"> --}}
                        <img src="{{ Avatar::create(auth()->user()->name)->toBase64(); }}">
                        @endif
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="active-page">
                        <a href="{{ route('dashboard') }}" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('index') }}" target="_blank"><i class="material-symbols-outlined">visibility</i>View Website</a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}"><i class="material-symbols-outlined">face</i>Update Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}"><i class="material-symbols-outlined">category</i>Update Category</a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('profile') }}"><i class="material-symbols-outlined">face</i>Students Part</a>
                    </li> --}}
                    <li>
                        <a href="#"><i class="material-symbols-outlined">school</i>Providing Services,<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('php.question.view') }}">Add Question</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="material-symbols-outlined">conditions</i>Students Section<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('student.feedback.show') }}">Student Feedbacks,</a>
                            </li>
                            <li>
                                <a href="{{ route('comment.view') }}">Student Massages,</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons fs-1 m-3">search</i></a>
                                </li>
                                <li class="nav-item ">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="bg-body m-3"><i class="material-symbols-outlined fs-1 text-danger">logout</i></button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a> --}}
                                    <h2 class="text-uppercase m-2"> {{ auth()->user()->name }} </h2>
                                    <p class="m-2"> {{ auth()->user()->email }} </p>
                                </li>
                                {{-- just for reserve --}}
                                {{-- <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="{{ asset('backend') }}/assets/images/flags/us.png" alt=""></a>
                                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                            <li><a class="dropdown-item" href="#"><img src="{{ asset('backend') }}/assets/images/flags/germany.png" alt="">German</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="{{ asset('backend') }}/assets/images/flags/italy.png" alt="">Italian</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="{{ asset('backend') }}/assets/images/flags/china.png" alt="">Chinese</a></li>
                                        </ul>
                                </li> --}}
                                {{-- just for reserve --}}

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        @yield('content')


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('backend') }}/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/main.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script_content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/dashboard.js"></script>
</body>
</html>
