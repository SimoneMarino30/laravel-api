@extends('layouts.guest')

@section('title', 'Projects')

@section('guest-view')
  
 @forelse($projects as $project)
    <div class="card-box">
      <div class="card" style="width: 18rem;">
        <figure>
          <img src="{{ $project->link ? asset('storage/' . $project->link) : 'https://www.frosinonecalcio.com/wp-content/uploads/bfi_thumb/default-placeholder-38gbdutk2nbrubtodg93tqlizprlhjpd1i4m8gzrsct8ss250.png' }}" alt="" class="img-fluid">
          <figcaption>{{ $project->date }}</figcaption>
        </figure>
        <div class="card-body">
          <h5 class="card-title" style="height: 5rem;">{{ $project->title }}</h5>
          <p class="card-text" style="height: 8.5rem;">{{ $project->description }}</p>
          <a href="{{ route('projects.show', $project) }}">
            <i class="bi bi-eye-fill"></i>
          </a>
        </div>
      </div>      
    </div>
  @empty
  🤷‍♂️
  @endforelse
@endsection