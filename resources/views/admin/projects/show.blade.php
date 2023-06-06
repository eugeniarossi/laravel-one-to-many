@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h3 class="my-3">{{ $project->title }}</h3>

    <h5>Type: {{ $project->type?->name ?: 'None' }}</h5>
    
    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="my-3">
    @endif
        
    <p>{{ $project->content }}</p>

    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning my-3">Edit</a>
</div>
@endsection
