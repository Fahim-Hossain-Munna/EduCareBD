@extends('layouts.frontendmaster')

@section('front_content')

<!-- service part start -->

<section id="services" class="sec_service">
    <div class="container">
      <div class="service-header margin-top">
        <h2>Our Services</h2>
      </div>
      <div class="service-content">
        @foreach ($categories as $category)
        <div class="root">
          <div class="image">
            <a href="#"><img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture}}" alt="php"></a>
            <div class="opacity">
              <a href="#"><div class="icon">
                <i class="fa-solid fa-person-chalkboard"></i>
              </div></a>
            </div>
          </div>
          <div class="details">
            <h3>{{ $category->category_name }}</h3>
            <p>{{ Str::limit($category->category_description ,'250') }}</p>
            @auth
            <div class="ancor">
              <a href="{{ route('service.details',$category->id)  }}"> show more <i class="fa-solid fa-arrow-right"></i> </a>
            </div>
            @else
            <div class="ancor">
              <a href="#" id="not_log_in" > show more <i class="fa-solid fa-arrow-right"></i> </a>
            </div>
            @endauth
          </div>
        </div>
        @endforeach
      </div>
          <!-- <div class="service-bottom">
            <a href=""> Click More </a>
          </div> -->
    </div>
  </section>

  <!-- service part start -->

@endsection
