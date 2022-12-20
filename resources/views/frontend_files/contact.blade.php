@extends('layouts.frontendmaster')

@section('front_content')

<!-- contact_section - start
     ================================================== -->
<div class="map_section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14615.751395291183!2d90.47381766371268!3d23.678180510886577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b725f82245f5%3A0xcf55731a51d11465!2sBhuigor%2C%20Siddhirganj!5e0!3m2!1sen!2sbd!4v1670492513478!5m2!1sen!2sbd"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- contact_section - end
================================================== -->

<!-- contact_section - start
      ================================================== -->
<section class="contact_section section_space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="contact_info_wrap">
                    <h3 class="contact_title">Our Information</h3>
                    <div class="decoration_image">
                        <img src="{{ asset('frontend/assets') }}/images/about_images/leaf.png" alt="image_not_found">
                    </div>
                    <p>EduCare BD is a platform from where you can select your preferred category and get more knoloedge from it.
                        So Why are you wait for,be prepare for your upcoming interview.
                    </p>
                    <p>Thank You</p>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="img1">
                                <img src="{{ asset('frontend/assets') }}/images/about_images/munna.jpg" alt="">
                            </div>
                            <div class="contact_info_list">
                                <h4 class="list_title">Fahim Hossain Munna</h4>
                                <ul class="ul_li_block">
                                    <li>Khan Tower Floor-6D</li>
                                    <li>West Canalpar,Narayanganj</li>
                                    <li>fahim.education.bd@gmail.com</li>
                                    <li>(+880)-175-573-6548</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="img1">
                                <img src="{{ asset('frontend/assets') }}/images/about_images/jubayer.png" alt="">
                            </div>
                            <div class="contact_info_list">
                                <h4 class="list_title">Jubayer Ahmed Pranto</h4>
                                <ul class="ul_li_block">
                                    <li>Dhaka Twin Tower Concord </li>
                                    <li>Shopping Complex</li>
                                    <li>prantoahmed@gmail.com</li>
                                    <li>(+880)-199-771-1229</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="contact_info_wrap">
                    <h3 class="contact_title">Contact With Us</span></h3>
                    <div class="decoration_image">
                        <img src="{{ asset('frontend/assets') }}/images/about_images/leaf.png" alt="image_not_found">
                    </div>
                    <p>Let's Have a Talk.</p>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form_item">
                            <input id="contact-form-name" class=" @error('name') is-invalid @enderror" type="text" name="name" placeholder="Your Name">
                            @error('name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form_item">
                                <input id="contact-form-email" class="@error('email') is-invalid @enderror" type="email" name="email" placeholder="Your Email">
                                @error('email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form_item">
                                <input type="text" class="@error('subject') is-invalid @enderror" name="subject" placeholder="Your Subject">
                                @error('subject')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form_item">
                            <textarea id="contact-form-message" class="@error('message') is-invalid @enderror" name="message" placeholder="Message"></textarea>
                            @error('message')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div id="form-msg"></div>
                        <div class="send_btn">
                            <button id="contact-form-submit" type="submit" class="btn btn_dark01">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact_section - end
    ================================================== -->

@endsection

@section('script_content')

@if (session('info_success_msg'))
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
    title: '{{ session('info_success_msg') }}'
  })
    </script>
@endif

@endsection
