@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-3">Dashboard</h3>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <span>Panel</span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <h5 class="text-center"><span class="text-primary fw-bold">{{ Auth::user()->name }} </span>you're logged in! Nice!</h5>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span>Info</span>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-4">&propto; Number of Projects stored in <em>Database</em>: {{ $num_projects }}</h5>

                        <h5>&propto; Last Project added:</h5>
                        <div class="ms-5">
                            <div class="container mb-2">
                                <h5 class="text-primary fw-bold">{{ $last_project->name }}
                                    <a href="{{ route('admin.projects.show', $last_project) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('admin.projects.edit', $last_project) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-pencil"></i></a>
                                </h5>
                            </div>
                            <div class="container mb-2">
                                <img src="{{ asset('storage/' . $last_project->image_path) }}" alt="" class="w-25">
                            </div>
                            <div class="container mb-2">
                                <p>{!! $last_project->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
