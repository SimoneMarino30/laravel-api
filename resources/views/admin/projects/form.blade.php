@extends('layouts.app')

@section('title', $project->id ? 'Modifica Project' . $project->id : 'Crea Project')

@section('content')

@if($project->id)
  <form 
  action="{{ route('admin.projects.update', $project) }}" 
  enctype="multipart/form-data" 
  method="POST" 
  class="row gy-3">
  @method('put')
@else
  <form 
  action="{{ route('admin.projects.store') }}" 
  enctype="multipart/form-data" 
  method="POST" class="row gy-3">
@endif

@csrf
{{-- TITLE --}}
<div class="col-6">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $project->title }}">
  @error('title')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

  {{-- SELECT TYPE --}}
  
  <label for="type_id" class="form-label">Stack</label>
  <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id" >
    <option value="">Nessuna tipologia</option>
    @foreach($types as $type)
    <option @if(old('type_id', $project->type_id) == $type->id) selected @endif value="{{ $type->id }}">{{ $type->label }}</option>
    @endforeach
    {{-- prova errore --}}
    <option value="10">Prova errore</option>
  </select>
  @error('type_id')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

     {{-- CHECKBOX TECH --}}

    
    <label for="technologies" class="form-label">Tech</label>
   
    <div class="form-check col-12">
      @foreach ($technologies as $technology)
      <input type="checkbox" id="technology{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]" 
      class="form-check-control @error('technologies') is-invalid @enderror p-0 " 
      @if(in_array($technology->id, old($technology->id, $project_technologies ?? []))) checked @endif> 
      <label for="technology{{ $technology->id }}">{{ $technology->label }}</label> 
      <br>
      @endforeach

      {{-- prova errore --}}
      <input type="checkbox" id="technology_10" value="10" name="technologies[]" class="form-check-control"> 
      <label for="technology_10">INVALID FEEDBACK</label> 
      <br>

      @error('technologies')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
  {{-- DATE --}}
  
  <label for="date" class="form-label">Date</label>
  @if($project->id)
  <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('project->date', date('Y-m-d', strtotime($project->date))) }}">
  @else
  <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="">
  @endif
  @error('date')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>

  {{-- LINK --}}

  <div class="col-6 mt-5">
    <img src="{{ $project->getImageUri() }}" alt="" class="img-fluid mb-2" id="link-preview">
  {{-- <label for="link" class="form-label">Link</label> --}}
  <input type="file" class="form-control @error('link') is-invalid @enderror" id="link" name="link"  value="{{ old('link') }}">
  @error('link')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
  </div>
<div class="col-12">

  {{-- DESCRIPTION --}}

  <label for="description" class="form-label">Description</label>
  <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
    {{ old('description') ?? $project->description }}
  </textarea>
  @error('description')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
<div class="col-12 d-flex">
  <button type="submit" class="btn btn-outline-success ms-auto">Save</button>
</div>
</form>
@endsection

@section('scripts')
<script>
  
  const linkInputEl = document.getElementById('link');
  const linkPreviewEl = document.getElementById('link-preview');
  const placeholder = linkPreviewEl.src;

  linkInputEl.addEventListener('change', () =>{
    if(linkInputEl.files && linkInputEl.files[0]) {
      const reader = new FileReader();
      reader.readAsDataURL(linkInputEl.files[0]);

      reader.onload = e => {
        linkPreviewEl.src = e.target.result;
      }
    }
  })
</script>
@endsection