@extends('layouts.guest')

@section('title', $project->title)

@section('guest-view')
 
  <section class="card clearfix">
  <div class="card-body">
    <figure class="float-end ms-5 mb-3">
      <img src="{{ $project->link ? asset('storage/' . $project->link) : 'https://www.frosinonecalcio.com/wp-content/uploads/bfi_thumb/default-placeholder-38gbdutk2nbrubtodg93tqlizprlhjpd1i4m8gzrsct8ss250.png' }}" alt="" class="img-fluid">
    </figure>
    
    {{-- MUTATOR VERSION FOR WHEN IS WORKING --}}
    {{-- $value ? asset('storage/' . $value) : 'https://www.frosinonecalcio.com/wp-content/uploads/bfi_thumb/default-placeholder-38gbdutk2nbrubtodg93tqlizprlhjpd1i4m8gzrsct8ss250.png' --}}
    <figcaption>
      <h3 class="my-5">{{ $project->description }}</h3>
      <p class="text-muted text-secondary m-0"> {{ $project->date }}</p>
    </figure>
  </div>
</section>
  <a href="{{ route('projects.index') }}" class="btn btn-outline-primary  my-5 mx-3">
    Back to projects
  </a>
@endsection