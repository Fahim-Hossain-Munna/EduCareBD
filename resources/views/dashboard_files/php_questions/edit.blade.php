@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Category Edit</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Question Information Edit,</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <form class="row g-3" action="{{ route('php.question.edit' , $questions_edit->id) }}" method="POST">
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
                            <div class="col-md-12">
                                <label class="form-label">Subject Questions,</label>
                                <textarea class="form-control" name="subject_question" cols="50" rows="2">{{ $questions_edit->subject_question }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Subject Answer,</label>
                                <textarea class="form-control" name="subject_ans" cols="50" rows="4">{{ $questions_edit->subject_ans }}</textarea>
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

@endsection
