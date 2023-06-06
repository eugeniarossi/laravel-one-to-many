@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h3 class="my-3">{{ $type->name }}</h3>

    <div class="my-4">
        <p>List of projects connected to this type:</p>
        <ul>
        @foreach ($type->project as $project)
            <li class="my-4">
                <div class="d-flex align-items-baseline">
                    <h6>{{ $project->title }}</h6>
                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-success mx-3">Show</a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-sm btn-warning my-3">Edit</a>
</div>
@endsection
