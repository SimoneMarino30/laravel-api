@extends('layouts.app')

@section('title', 'Projects.index')

@section('content')
<div class="row my-4">
      <form class="col-8 d-flex justify-content-start" role="search">
        <input class="form-control me-2" name="term" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary my-0" type="submit">Search</button>
      </form>
      <div class="col-4 d-flex justify-content-end">
        <a type="button" href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary">
          Create New Project
        </a>
        
      </div>
  </div>

  <table class="table my-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col">Tech</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @forelse($projects as $project)
    <tr>
      <th scope="row">{{ $project->id }}</th>
      <td>{{ $project->title }}</td>
      <td>{{ $project->type?->label }}</td>
      <td>
        @forelse($project->technologies as $technology) 
        {{ $technology->label }} 
        @unless ($loop->last)
        , 
        @endunless
        @empty 
        🤷‍♂️ 
        @endforelse
      </td>
      <td>{{ $project->date }}</td>
      <td>
        <a href="{{ route('admin.projects.show', $project) }}">
        <i class="bi bi-eye-fill me-3"></i>
        </a>
        <a href="{{ route('admin.projects.edit', $project) }}">
          <i class="bi bi-pencil-fill me-3"></i>
        </a>
        <button class="bi bi-trash3-fill text-danger btn-trash" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $project->id }}"></button>
      </td>
    </tr>
  @empty
  🤷‍♂️ 
  @endforelse
  </tbody>
</table>
{{ $projects->links() }}
@endsection

@section('modals')
@foreach ($projects as $project)
<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-bg">
        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Il progetto n° {{ $project->id }} sta per essere eliminato</h1>
        <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-circle"></i>
        </a>
      </div>
      <div class="modal-body modal-bg">
        Vuoi eliminare definitivamente il progetto? <br>
        La risorsa non potrà essere recuperata
      </div>
      <div class="modal-footer modal-bg">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-file-arrow-down"></i>
          Annulla
        </button>
      
        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
          @csrf
          @method('delete')
          
          <button class="btn btn-danger">
            <i class="bi bi-trash3-fill"></i>
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection