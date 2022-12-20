@extends('layouts.frontendmaster')

@section('front_content')


<!-- Banner part start -->
<section id="banner">
    <!-- <div class="banner-image">
                <img src="{{ asset('frontend/assets') }}/images/banner.jpg" alt="image"> -->
    <div class="opacity">
      <div class="container">
        <div class="banner-quote">
          <h2>"Education is One Thing No One Can Take Away From You"</h2>
          <p>If there’s one thing that’s certain in life is that everything is constantly changing. You may suffer
            losses when it comes to loved ones, finances, belongings, and the like. But, the thing that you can never
            lose is your education.</p>
        </div>
      </div>
    </div>

  </section>
  <!-- Banner part end -->

  <!-- Category part start -->
  <section id="category">
    <div class="container">
      <div class="category-header">
        <h2>Our Category</h2>
        <p>our priority is providing knowledge in our valuable students</p>
      </div>
      <div class="category-slider">
        @forelse ($categories as $category)
        <div class="one">
            <div class="image">
              @auth
              <a href=""><img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture }}" alt="php"></a>
              @else
              <a href="#category"><img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture }}" alt="php"></a>
              @endauth
            </div>
            <div class="details">
              <h3>{{ $category->category_name }}</h3>
            </div>
          </div>
        @empty

        @endforelse
      </div>
  </section>
  <!-- Category part end -->


  <!-- service part start -->

  <section id="services">
    <div class="container">
      <div class="service-header">
        <h2>Our Services</h2>
      </div>
      <div class="service-content">
              @foreach ($categories as $category)
               @if( $loop->index < 3 )
               <div class="root">
                @auth
                <div class="image">
                    <a href="{{ route('service.details',$category->id)  }}"><img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture}}" alt="php"></a>
                    <div class="opacity">
                      <a href="{{ route('service.details',$category->id)  }}"><div class="icon">
                        <i class="fa-solid fa-person-chalkboard"></i>
                      </div></a>
                    </div>
                  </div>
                    @else
                <div class="image">
                        <a href="#service-content"><img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture}}" alt="php"></a>
                        <div class="opacity">
                          <a href="#service-content"><div class="icon">
                            <i class="fa-solid fa-person-chalkboard"></i>
                          </div></a>
                        </div>
                    </div>
                @endauth
                <div class="details">
                  <h3>{{ $category->category_name }}</h3>
                  <p>{{ Str::limit($category->category_description ,'250') }}</p>
                  @auth
                  <div class="ancor">
                    <a href="{{ route('service.details',$category->id)  }}"> show more <i class="fa-solid fa-arrow-right"></i> </a>
                  </div>
                  @else
                  <div class="ancor">
                    <a href="#services" class="not_log_in" > show more <i class="fa-solid fa-arrow-right"></i> </a>
                  </div>
                  @endauth
                </div>
              </div>
               @endif
              @endforeach

      </div>
          <div class="service-bottom">
            <a href="{{ route('service') }}"> Click More </a>
          </div>
    </div>
  </section>

  <!-- service part start -->


  <!-- student comment part start -->

  <section id="student-comment">
    <div class="opacity">
      <div class="container">
          <div class="feed-head">
            <h2> What our Student Think About us ?</h2>

          </div>
          <div class="feed-slick">
              @forelse ($feedbacks as $feedback)
              <div class="slide">
                <div class="left-side">
                  <div class="image">
                    <img src="{{ asset('frontend/uploads/feedback_image') }}/{{ $feedback->photo }}" alt="rofile img">
                  </div>
                  <div class="quote">
                    <i class="fa-solid fa-quote-right"></i>
                  </div>
                </div>
                <div class="right-side">
                  <h3>{{ $feedback->name }}</h3>
                  <h5>"How About the {{ $feedback->category }} Preparation Qustion"</h5>
                  <p>{{ $feedback->comment }}</p>
                </div>
              </div>
              @empty
              <div class="slide">
                <div class="left-side">
                  <div class="image">
                    <img src="{{ asset('frontend/assets') }}/images/profile/profile img.jpg" alt="rofile img">
                  </div>
                  <div class="quote">
                    <i class="fa-solid fa-quote-right"></i>
                  </div>
                </div>
                <div class="right-side">
                  <p class="text-danger">No Feedback Comments Yet!!</p>
                </div>
              </div>
              @endforelse

          </div>
      </div>
    </div>
  </section>

  <!-- student comment part end -->

  <!-- student feedback part start -->
    <section id="feedback">
      <div class="container">
          <div class="content">
            <div class="col-6">
              <div class="left-side">
                <i class="fa-solid fa-dove"></i>
                <h2>Feedback</h2>
                <p>Feedback is basically the concept of taking output and using it as input, either to further drive the system or produce a desired output. A good example is feedback used in an assembly line, when an output does not meet the minimum quality or quantity set by the system, it adjusts itself either to ramp up the production speed or even automatically stop if there are major deviations in the output</p>
              </div>
            </div>
            <div class="col-6">
              <div class="right-side">
                <div class="control-flex">
                  <form action="{{ route('student.feedback') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="lebel">Name</label>
                      <input type="text" placeholder="username" class="form-control input-css @error('name') is-invalid @enderror" name="name">
                            @error('name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label class="lebel">E-mail Address</label>
                      <input type="text" placeholder="email" class="form-control input-css @error('email') is-invalid @enderror" name="email">
                            @error('email')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label class="lebel">upload Photo</label>
                      <input type="file" class="form-control input-css @error('photo') is-invalid @enderror" name="photo">
                            @error('photo')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label class="lebel">Category</label>
                        <select class="form-select input-css @error('category') is-invalid @enderror" name="category">
                          <option selected>select your preference category</option>
                          <option value="php">php</option>
                          <option value="laravel">laravel</option>
                          <option value="html">html</option>
                          <option value="excel">MS Excel</option>
                        </select>
                            @error('category')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                      </div>
                    <div class="mb-3">
                      <label class="lebel">Message</label>
                      <textarea class="form-control input-css @error('comment') is-invalid @enderror" name="comment" rows="4" cols="50"></textarea>
                            @error('comment')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                    @auth
                    <div class="mb-3">
                      <button class="btn btn-primary mt-3" type="submit">Submit</button>
                    </div>
                    @else
                    <div class="mb-3">
                      <a class="btn btn-primary mt-3" id="user_not_in" href="#feedback">Submit</a>
                    </div>
                    @endauth
                  </form>
                </div>
            </div>
            </div>
          </div>
      </div>
    </section>

    <!-- student feedback part end -->

@endsection

@section('script_content')

<script>
  $(document).ready(function(){
    $('#user_not_in').click(function(){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'please login first then submit!',
        footer: '<a href="{{ route('student.registration.index') }}"> Click here for Registration.</a>'
      })
    });
  });
</script>

@if (session('feedback_send_msg'))
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
    title: '{{ session('feedback_send_msg') }}'
  })
    </script>
@endif

<script>
    $(document).ready(function(){
      $('.not_log_in').click(function(){
        Swal.fire(
        'Authenticate!!!',
        'Please signin then try?',
        'question'
      )
      });
    });
</script>

@endsection
