@extends('layouts.app')

@section('title')

@section('content')
  {{-- @dump($type); --}}
<section style="border: 2px dashed blue" class="">
    <div id="show_card" class="card text-center text-light mx-auto" style="background-color: {{ $type->color }}">
  <div class="my-5">{{ $type->label }}</div> 
  <div class="card-body">
    <h5 class="card-title mb-5">{{ $type->color }}</h5>
    <a 
    href="{{ route('types.index') }}" 
    class="btn btn-outline-primary my-5 mx-3">
      <span 
      class="badge rounded-pill" 
      style="background-color: {{ $type->color }}">{{ $type->label }}
      </span>
      <span>Back to list</span>
    </a>
  </div>
</section>
  
@endsection

