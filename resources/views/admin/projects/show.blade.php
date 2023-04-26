@extends('layouts.app')

@section('title', $project->title)

@section('content')
{{-- @dump($project) --}}
<section class="card clearfix">
  <div class="card-body">
    <figure class="float-end ms-5 mb-3">
      <img src="{{ $project->getImageUri() }}" alt="" class="img-fluid">
    </figure>
    <div>{{ $project->type?->label }}</div>
    <figcaption>
      <h3 class="my-5">{{ $project->description }}</h3>
      <p class="text-muted text-secondary m-0"> {{ $project->date }}</p>
    </figure>
  </div>
</section>
  <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary my-5 mx-3">
  Back to list
  </a>
@endsection

