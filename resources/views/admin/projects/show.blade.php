@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h3 class="my-3">{{ $project->title }}</h3>
    
    @if ($project->image)
    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
    @endif
        
    <p>{{ $project->content }}</p>
</div>
@endsection
