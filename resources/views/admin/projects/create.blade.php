@extends('layouts.app')

@section('content')
<div class="container my-3">
    {{-- header --}}
    <h3>Create new Project</h3>

    {{-- validation errors --}}
    @include('partials.errors')
    {{-- /validation errors --}}

    {{-- form --}}
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- title input --}}
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        {{-- /title input --}}
        {{-- image input --}}
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        {{-- /image input --}}
        {{-- content input --}}
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea type="form-control" class="form-control" id="content" name="content">{{ old('content') }}</textarea>
        </div>
        {{-- /content input --}}
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      {{-- /form --}}
</div>
@endsection
