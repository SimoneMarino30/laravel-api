@extends('layouts.app')

@section('title', 'technologies.index')

@section('content')
<div class="row my-4">
      <div class="col-12 d-flex justify-content-end">
        <a type="button" href="{{ route('technologies.create') }}" class="btn btn-outline-primary ms-auto">
          New Technology
        </a>
        
      </div>
  </div>

  <table class="table table-striped my-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Label</th>
      <th scope="col"></th>
      <th scope="col">Color</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($technologies as $technology)
    <tr>
      <th scope="row">{{ $technology->id }}</th>
      <td>
        <span class="badge rounded-pill" style="background-color: {{ $technology->color }}">{{ $technology->label }}</span>
      </td>
      <td  class="d-flex justify-content-end">
        <span class="rounded-circle d-inline-block color_preview" style="background-color: {{ $technology->color }}"></span>
      </td>
      <td>
        {{ $technology->color }}
      </td>
      <td>
        <a href="{{ route('technologies.show', $technology) }}">
        <i class="bi bi-eye-fill me-3"></i>
        </a>

        <a href="{{ route('technologies.edit', $technology) }}">
          <i class="bi bi-pencil-fill me-3"></i>
        </a>

        <button class="bi bi-trash3-fill text-danger btn-trash" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $technology->id }}"></button>
      </td>
    </tr>
    @empty
    @endforelse
  </tbody>
</table>
{{ $technologies->links() }}
@endsection

@section('modals')
@foreach ($technologies as $technology)
<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $technology->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-bg">
        <h1 class="modal-title fs-5 text-danger" id="delete-type-modal">La tipologia n° {{ $technology->id }} sta per essere eliminato</h1>
        <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-circle"></i>
        </a>
      </div>
      <div class="modal-body modal-bg">
        Vuoi eliminare definitivamente la tecnologia "{{ $technology->label }}"? <br>
        La risorsa non potrà essere recuperata
      </div>
      <div class="modal-footer modal-bg">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-file-arrow-down"></i>
          Annulla
        </button>
      
        <form action="{{ route('technologies.destroy', $technology) }}" method="POST">
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