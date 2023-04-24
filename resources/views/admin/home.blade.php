@extends('layouts.app')

@section('content')

<div class="container">
  <h2 class="fs-4 text-secondary my-4">
    {{ __('Dashboard') }}
  </h2>
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header">{{ __('User Dashboard') }}-Welcome!</div>
          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
            {{ __('You are logged in! Get to work now !!!') }}
          @section('tasks-list')
            <ul>
              @foreach ($tasks as $task)
                <li class="d-flex">
                  <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')
                    <span class="mx-5">{{ $task->created_at }}</span>
                    <label>
                      <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed_at ? 'checked' : '' }}>
                      {{ $task->title }}
                    </label>
                    <span class="mx-5">{{ $task->completed_at }}</span>
                  </form>
                  @if ($task->completed_at)
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                     @csrf
                     @method('DELETE')
                      <button class="bi bi-trash3-fill text-danger btn-trash" data-bs-toggle="modal" data-bs-target="#delete-type-{{ $task->completed_at }}"></button>
                    </form>
                  @endif
                </li>
              @endforeach
            </ul>
          @endsection
          </div>
        </div>
    </div>
  </div>
</div>
<form method="POST" action="{{ route('tasks.store') }}">
  @csrf
  <label for="title">New Task:</label>
  <input type="text" id="title" name="title" required>
  <button type="submit">Add</button>
</form>
@endsection


