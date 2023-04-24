@extends('layouts.app')

@section('title', $type->id ? 'Modifica type' . $type->label : 'Crea type')

@section('content')

<section class="card py-2">
  <div class="card-body">
    @if($type->id)
      <form method="POST" action="{{ route('types.update', $type) }}" enctype="multipart/form-data" class="row gy-3">
      @method('put')
      @else
      <form method="POST" action="{{ route('types.store') }}" enctype="multipart/form-data" class="row gy-3">
    @endif

    @csrf

    <div class="row mb-3">
      <div class="col-md-2 text-end">
        <label for="label" class="form-label">Label</label>
        <input type="text" id="label" name="label" class="form-control @error('label') is-invalid @enderror" value="{{ old('label', $type->label) }}">

        @error('label')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

     <div class="row mb-3">
      <div class="col-md-2 text-end">
        <label for="color" class="form-color">Color</label>
        <input type="color" id="label" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $type->color) }}">

        @error('color')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <div class="col-12 d-flex">
      <button type="submit" class="btn btn-outline-success ms-auto">Save</button>
    </div>

    </form>
  </div>
</section>

@endsection