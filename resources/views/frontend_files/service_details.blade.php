@extends('layouts.frontendmaster')

@section('front_content')

<section id="details">

    <div class="container">
        <div class="top-part">
            <h2>"Top 50 {{ $category->category_name }} Most Popular Questions You Must Prepare in 2023"</h2>
            <div class="mid">
                <p>Last updated on Nov 18,2022</p>
                <div class="d-flex justify-content-center pb-5">
                    <div id="share"></div>
                </div>
            </div>
            {{-- <div class="bottom">
                <div class="image">
                    <img src="{{ asset('frontend/assets') }}/images/profile/profile img.jpg" alt="profile_img">
                </div>
                <div class="about">
                    <h3>{{  }}</h3>
                    <p>A Data Science Enthusiast with in-hand skills in programming languages such as Java & Python.</p>
                </div>
            </div> --}}
        </div>
        <div class="bottom-part">
            <div class="header-start">
                <h3>Most Popular <span class="text-primary">{{ $category->category_name }}</span> Questions,</h3>

                <div class="col-sm-12">
                    <div class="service_block_img mt-5 d-flex justify-content-center">
                        <img src="{{ asset('backend/uploads/category_photo') }}/{{ $category->category_picture }}" style="height:350px;">
                    </div>
                </div>
            </div>

            @foreach ($related_data as $data)
            <div class="content-start">
                <h3>Q{{ $loop->index+1 }}. {{ $data->subject_question }}</h3>
                <p><span>Ans :</span> {{ $data->subject_ans }}</p>
            </div>
            @endforeach
        </div>
    </div>

</section>

@endsection


@section('script_content')

<script>
$("#share").jsSocials({
  url: "https://github.com/Fahim-Hossain-Munna",
  text: "Support Our EduCare BD",
  showLabel: true,
  shares: [
    "linkedin",
    { share: "facebook", label: "Like our Page" },
    { share: "whatsapp", label: "Send a Message" },
  ],
});
</script>

@endsection
