@extends('layouts.dashboardmaster')

@section('content')


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1><span class="text-danger">{{ $category->category_name }}</span> Questions, </h1>
            <p>Total Questions : <span class="badge bg-success">{{ $related_data->count() }}</span> </p>
        </div>
    </div>
</div>

@forelse ($related_data as $data)
<div class="col-xl-12">
    <div class="card widget widget-popular-blog">
        <div class="card-body">
            <div class="widget-popular-blog-container">
                <div class="widget-popular-blog-image">
                    <span class="widget-popular-blog-date">Update by :</span>
                    <img src="{{ asset('backend/uploads/user_photo') }}/{{ $data->RelationWithUser->user_photo}}" alt="">
                    <p class="mt-3 text-danger">{{ $data->RelationWithUser->name }}</p>
                </div>
                <div class="widget-popular-blog-content ps-4 mt-5">
                    <span class="widget-popular-blog-title">
                        Subject Title : {{ $data->subject_name }}
                    </span>
                    <span class="widget-popular-blog-text">
                        Subject Question : {{ $data->subject_question }}
                    </span>
                    <p class="text-primary mt-2">Ans : {{ $data->subject_ans }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <span class="widget-popular-blog-date">
                 Update : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->diffForHumans() }}
            </span>
        </div>
    </div>
</div>
@empty

@endforelse


@endsection
