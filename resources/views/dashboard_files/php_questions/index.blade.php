@extends('layouts.dashboardmaster')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Question Submit/Edit/Update</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">All Qustions Add,</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <form class="row g-3" action="{{ route('php.question.insert.db') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Subject Title</label>
                                <select class="form-select" name="subject_name">
                                    <option selected>Choose Subject Title</option>
                                    <option value="Interview Question">Interview Question</option>
                                    <option value="Basic">Basic</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject Category Name</label>
                                <select class="form-select" name="subject_category_id">
                                    <option selected>Choose Subject Category</option>
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @empty
                                    <option value="">NONE</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject Questions,</label>
                                <textarea class="form-control" name="subject_question" cols="50" rows="4"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject Answer,</label>
                                <textarea class="form-control" name="subject_ans" cols="50" rows="4"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @forelse ($questions as $question)
    <div class="col-xl-6">
        <div class="card widget widget-connection-request">
            <div class="card-header">
                <h5 class="card-title">Serial no : {{ $questions->firstitem()+$loop->index  }}<span class="badge badge-secondary badge-style-light">{{ \Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</span></h5>
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
                            Subject Title : {{ $question->subject_name }}
                        </span>
                        <span class="widget-connection-request-info-count">
                            Subject Category : {{ $question->RelationWithCategory->category_name }}
                        </span>
                        <span class="widget-connection-request-info-about">
                            Subject Question : {{ $question->subject_question }}
                        </span>
                        <span class="widget-connection-request-info-count">
                            Subject Answer : <p class="text-info">{{ $question->subject_ans }}</p>
                        </span>
                    </div>
                </div>
                <div class="widget-connection-request-actions d-flex">
                    <form action="{{ route('php.question.edit.view', $question->id) }}" method="GET">
                        @csrf
                    <button type="submit" class="btn btn-primary btn-style-light flex-grow-1 m-r-xxs"><i class="material-icons">done</i>Edit</button>
                    </form>
                    <form action="{{ route('php.question.delete.db' , $question->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs"><i class="material-icons">close</i>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>

{{ $questions->links() }}

@endsection

@section('script_content')

@if (session('questions_insert_msg'))
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
    title: '{{ session('questions_insert_msg') }}'
  })
    </script>
@endif


@if (session('questions_delete_msg'))
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
    title: '{{ session('questions_delete_msg') }}'
  })
    </script>
@endif


@if (session('questions_update_msg'))
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
    title: '{{ session('questions_update_msg') }}'
  })
    </script>
@endif

@endsection
