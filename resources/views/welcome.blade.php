@extends('layouts.guest')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Home') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    Welcome to the front
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    @foreach($projects as $project)
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $project->title }}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
@endforeach --}}
@endsection