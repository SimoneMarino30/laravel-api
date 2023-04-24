@extends('layouts.app')

@section('title', 'Types.index')

@section('content')
<div class="row my-4">
      {{-- <form class="col-8 d-flex justify-content-start" role="search">
        <input class="form-control me-2" name="term" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary my-0" type="submit">Search</button>
      </form> --}}
      <div class="col-12 d-flex justify-content-end">
        <a type="button" href="{{ route('types.create') }}" class="btn btn-outline-primary ms-auto">
          New Stack
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
    @forelse($types as $type)
    <tr>
      <th scope="row">{{ $type->id }}</th>
      <td>
        <span class="badge rounded-pill" style="background-color: {{ $type->color }}">{{ $type->label }}</span>
      </td>
      <td  class="d-flex justify-content-end">
        <span class="rounded-circle d-inline-block color_preview" style="background-color: {{ $type->color }}"></span>
      </td>
      <td>
        {{ $type->color }}
      </td>
      <td>
        <a href="{{ route('types.show', $type) }}">
        <i class="bi bi-eye-fill me-3"></i>
        </a>

        <a href="{{ route('types.edit', $type) }}">
          <i class="bi bi-pencil-fill me-3"></i>
        </a>

        <button class="bi bi-trash3-fill text-danger btn-trash" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $type->id }}"></button>
      </td>
    </tr>
    @empty
    @endforelse
  </tbody>
</table>
{{ $types->links() }}
@endsection

@section('modals')
@foreach ($types as $type)
<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-bg">
        <h1 class="modal-title fs-5 text-danger" id="delete-type-modal">La tipologia n° {{ $type->id }} sta per essere eliminato</h1>
        <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-circle"></i>
        </a>
      </div>
      <div class="modal-body modal-bg">
        Vuoi eliminare definitivamente la tipologia "{{ $type->label }}"? <br>
        La risorsa non potrà essere recuperata
      </div>
      <div class="modal-footer modal-bg">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-file-arrow-down"></i>
          Annulla
        </button>
      
        <form action="{{ route('types.destroy', $type) }}" method="POST">
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