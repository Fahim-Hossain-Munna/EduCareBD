@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Students Feedback Showing List Below,</h1>
        </div>
    </div>
</div>

<div class="row">

    @forelse ($feedbacks as $feedback)
    <div class="col-xl-4">
        <div class="card widget widget-connection-request">
            <div class="card-header">
                <h5 class="card-title">Serial no : {{ $loop->index+1 }}<span class="badge badge-secondary badge-style-light">{{ \Carbon\Carbon::parse($feedback->created_at)->diffForHumans() }}</span></h5>
            </div>
            <div class="card-body">
                <div class="widget-connection-request-container d-flex">
                    <div class="widget-connection-request-avatar">
                        <div class="avatar avatar-xl m-r-xs">
                            <img src="{{ asset('frontend/uploads/feedback_image') }}/{{ $feedback->photo }}" alt="no image found">
                        </div>
                    </div>
                    <div class="widget-connection-request-info flex-grow-1">
                        <span class="widget-connection-request-info-name fs-4">
                            {{ $feedback->name }}
                        </span>
                        <h2 class="widget-connection-request-info-count text-success">
                             {{$feedback->category}}

                        </h2>
                        <span class="widget-connection-request-info-about">
                            {{ Str::limit($feedback->comment, 80 , '  ............') }}
                        </span>
                    </div>
                </div>
                @if ($feedback->status == false)
                <div class="widget-connection-request-actions d-flex">
                    <form action="{{ route('student.feedback.active', $feedback->id) }}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-primary btn-style-light flex-grow-1 m-r-xxs"><i class="material-icons">done</i>Accept</button>
                    </form>
                    <form action="{{ route('student.feedback.delete', $feedback->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs"><i class="material-icons">close</i>Ignore</button>
                    </form>
                </div>
                @else
                <div class="widget-connection-request-actions d-flex">
                    <form action="{{ route('student.feedback.reject', $feedback->id) }}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-warning btn-style-light flex-grow-1 m-r-xxs"><i class="material-icons">done</i>Reject</button>
                    </form>
                    <form action="{{ route('student.feedback.delete', $feedback->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs"><i class="material-icons">close</i>Ignore</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="col-xl-4">
        <div class="card widget widget-connection-request">
            <div class="card-header">
                <h5 class="card-title">Serial no : 0<span class="badge badge-secondary badge-style-light">00.00.00</span></h5>
            </div>
            <div class="card-body text-danger">
                    NO DATA FOUND
            </div>
        </div>
    </div>
    @endforelse
</div>

@endsection


@section('script_content')

@if (session('feedback_active_msg'))
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
    title: '{{ session('feedback_active_msg') }}'
  })
    </script>
@endif
@if (session('feedback_reject_msg'))
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
    title: '{{ session('feedback_reject_msg') }}'
  })
    </script>
@endif
@if (session('feedback_delete_msg'))
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
    icon: 'warning',
    title: '{{ session('feedback_delete_msg') }}'
  })
    </script>
@endif

@endsection
