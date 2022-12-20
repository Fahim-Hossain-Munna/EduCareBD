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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Category Information Edit,</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <form class="row g-3" action="{{ route('category.edit.post', $edits_data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Category Title</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" placeholder="{{ $edits_data->category_name }}">
                                @error('category_name')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category Image</label>
                                <input type="file" class="form-control @error('category_picture') is-invalid @enderror" name="category_picture">
                                @error('category_picture')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Category Description</label>
                                <textarea class="form-control @error('category_description') is-invalid @enderror" name="category_description" rows="4">
                                {{ $edits_data->category_description }}
                                </textarea>
                                @error('category_description')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
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
