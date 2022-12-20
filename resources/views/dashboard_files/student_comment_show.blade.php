@extends('layouts.dashboardmaster')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Students Contact Massage Showing List Below,</h1>
        </div>
    </div>
</div>

<div class="row">
    @forelse ($comments as $comment)
    <div class="col-xl-4">
        <div class="card widget widget-connection-request">
            <div class="card-header">
                <h5 class="card-title">Serial no : {{ $loop->index+1 }}<span class="badge badge-secondary badge-style-light">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span></h5>
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
                            Name : {{ $comment->name }}
                        </span>
                        <h2 class="widget-connection-request-info-count text-success">
                             Email : {{$comment->email}}

                        </h2>
                        <span class="widget-connection-request-info-count text-info">
                            Subject : {{ $comment->subject }}
                        </span>
                        <span class="widget-connection-request-info-about">
                            Massage : {{ Str::limit($comment->message, 80 , '  ............') }}
                        </span>
                    </div>
                </div>
                @if ($comment->status == false)
                <div class="widget-connection-request-actions d-flex">
                    <form action="{{ route('comment.active', $comment->id) }}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-primary btn-style-light flex-grow-1 m-r-xxs"><i class="material-icons">done</i>Accept</button>
                    </form>
                    <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs"><i class="material-icons">close</i>Ignore</button>
                    </form>
                </div>
                @else
                <div class="widget-connection-request-actions d-flex">
                    <form action="{{ route('comment.reject', $comment->id) }}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-warning btn-style-light flex-grow-1 m-r-xxs"><i class="material-icons">done</i>Reject</button>
                    </form>
                    <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
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

@if (session('comment_active_msg'))
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
    title: '{{ session('comment_active_msg') }}'
  })
    </script>
@endif
@if (session('comment_reject_msg'))
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
    title: '{{ session('comment_reject_msg') }}'
  })
    </script>
@endif
@if (session('comment_delete_msg'))
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
    title: '{{ session('comment_delete_msg') }}'
  })
    </script>
@endif

@endsection
