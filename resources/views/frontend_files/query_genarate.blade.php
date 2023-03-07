@extends('layouts.frontendmaster')

@section('front_content')

<div class="container">
    <div class="row d-flex justify-content-center">
       <div class="col-sm-6">
        <form action="{{ route('write.generate') }}" method="POST">
            @csrf
            <div class="input-group mb-5" style="padding-top: 200px">
                <input type="text" name="query" class="form-control" placeholder="write your query" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="submit">Button</button>
                </div>
            </div>
        </form>
       </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6" style="margin-bottom: 200px">
            <div class="list-group">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">The Question Is : {{ $title }}</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" spellcheck="false">{{ $content }}</textarea>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection
