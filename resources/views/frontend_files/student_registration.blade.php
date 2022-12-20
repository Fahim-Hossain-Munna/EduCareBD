@extends('layouts.frontendmaster')

@section('front_content')

<!-- register_section - start
            ================================================== -->
            <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <ul class="nav register_tabnav ul_li_center" role="tablist">
                                <li role="presentation">
                                    <button data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Sign In</button>
                                </li>
                                <li role="presentation">
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#signup_tab" type="button" role="tab" aria-controls="signup_tab" aria-selected="false">Register</button>
                                </li>
                            </ul>

                            <div class="register_wrap tab-content">
                                <div class="tab-pane fade" id="signin_tab" role="tabpanel">
                                    <form action="{{ route('student.login') }}" method="POST">
                                        @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">E-mail Address</h3>
                                            <div class="form_item">
                                                <label for="username_input"><i class="fas fa-user"></i></label>
                                                <input class="@error('email') is-invalid @enderror" id="username_input" type="text" name="email" placeholder="E-mail Address">
                                                @error('email')
                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input"><i class="fas fa-lock"></i></label>
                                                <input class="@error('password') is-invalid @enderror" id="password_input" type="password" name="password" placeholder="Password">
                                                @error('password')
                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- <div class="checkbox_item">
                                                <input id="remember_checkbox" type="checkbox">
                                                <label for="remember_checkbox">Remember Me</label>
                                            </div> -->
                                        </div>

                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_primary btn_sing_in">Sign In</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade show active" id="signup_tab" role="tabpanel">
                                    <form action="{{ route('student.registration') }}" method="POST">
                                        @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">User Name*</h3>
                                            <div class="form_item">
                                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                                <input class="@error('name') is-invalid @enderror" id="username_input2" type="text" name="name" placeholder="User Name">
                                                @error('name')
                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input class="@error('password') is-invalid @enderror" id="password_input2" type="password" name="password" placeholder="Password">
                                                @error('password')
                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email*</h3>
                                            <div class="form_item">
                                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                                <input class="@error('email') is-invalid @enderror" id="email_input" type="email" name="email" placeholder="Email">
                                                @error('email')
                                                <p class="text-danger mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_secondary btn_sing_in">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register_section - end
            ================================================== -->

@endsection

@section('script_content')

@if (session('registration_success_msg'))
    <script>
        const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: '{{ session('registration_success_msg') }}'
  })
    </script>
@endif

@endsection
