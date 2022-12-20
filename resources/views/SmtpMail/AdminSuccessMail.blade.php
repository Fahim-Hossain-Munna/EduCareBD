

    <div class="row">
        <div class="col-xl-4">
            <div class="card widget widget-connection-request">
                <div class="card-header">
                    <h5 class="card-title">Best Greetings Admin in Our Educare BD</h5>
                    <p> Your Are Promoted by Admin! </p>
                </div>
                <div class="card-body">
                    <div class="widget-connection-request-container d-flex">
                        {{-- <div class="widget-connection-request-avatar">
                            <div class="avatar avatar-xl m-r-xs">
                                <img src="{{ asset('frontend/uploads/feedback_image') }}/{{ $feedback->photo }}" alt="no image found">
                            </div>
                        </div> --}}
                        <div class="widget-connection-request-info flex-grow-1">
                            <span class="widget-connection-request-info-name fs-4">
                                Name : {{ $adminMail['name'] }}
                            </span>
                            <br>
                            <span class="widget-connection-request-info-count text-info">
                                E-mail : {{ $adminMail['email'] }}
                            </span>
                            <br>
                            <span class="widget-connection-request-info-count text-info">
                                Password : {{ $adminMail['password'] }}
                            </span>
                            <br>
                            <span class="widget-connection-request-info-about">
                                Massage : Log-in your Dashboard and Enjoy our exprience & build your exprience,Thank You.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

