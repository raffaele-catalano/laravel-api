@extends('layouts.admin')

@section('content')

    <div class="d-flex align-items-center justify-content-center">
        <h3 class="text-center mt-3">{{ $project->name }}</h3>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning mx-2"><i
            class="fa-solid fa-pencil fa-lg"></i></a>

        @include('admin.partials.delete-form')
    </div>

    <div class="container d-flex justify-content-center mb-2">
        <img src="{{ asset('storage/' . $project->image_path) }}" alt="" class="w-25">
    </div>
    <div class="container d-flex flex-column align-items-center">
        <h5><span class="text-primary">Category:</span> {{ $project->category }}</h5>
        <h5><span class="text-primary">Start Date:</span> {{ $project->start_date }}</h5>
        <h5><span class="text-primary">End Date:</span> {{ $project->end_date }}</h5>
        <h5><span class="text-primary">Type:</span> <span class="badge text-bg-info text-uppercase">{{ $project->type?->name ?? 'undefined' }}</span></h5>

        <h5 class="text-primary">Technology:</h5>
        <div class="tech-container d-flex justify-content-center">
            @forelse ( $project->technologies as $technology )
                <img class="logos" src="{{ '/technologies/' . $technology->slug . '.png' }}" alt="{{ $technology->name }}" title="{{ $technology->name }}">
            @empty
                {{-- <span class="mb-2 text-danger fw-bold">undefined</span> --}}
                <span class="badge text-bg-danger mb-2">Undefined</span>
            @endforelse
        </div>

        <h5><span class="text-primary">Status:</span> {{ $project->is_closed ? 'Closed' : 'Ongoing' }}</h5>
        <p>{!! $project->description !!}</p>
    </div>
    <div class="container d-flex justify-content-center my-3">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mx-2 py-2">
            Back to Projects
        </a>
        <a href="{{ route('admin.home') }}" class="btn btn-primary mx-2">
            Back to Dashboard
        </a>
    </div>

@endsection
