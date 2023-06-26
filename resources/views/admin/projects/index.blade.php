@extends('layouts.admin')

@section('content')
    <h3 class="text-center mt-3">Projects</h3>
    <div class="container d-flex flex-column align-items-center">

        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <th scope="col" class="text-center">
                        <a class="text-black text-decoration-none"
                            href="{{ route('admin.orderBy', ['direction' => $direction]) }}">
                            <span>#id</span>
                            @if ($direction === 'asc')
                                <i class="fa-solid fa-chevron-up fa-xs"></i>
                            @else
                                <i class="fa-solid fa-chevron-down fa-xs"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-center">Type</th>
                    <th scope="col" class="text-center">Technology</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="text-center">{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td class="text-capitalize">{{ $project->category }}</td>
                        <td class="text-center"><span class="badge text-bg-info text-uppercase">{{ $project->type?->name ?? 'undefined' }}</span></td>
                        <td class="text-center">
                        @forelse ( $project->technologies as $technology )
                            <span class="badge text-bg-warning text-uppercase">{{ $technology->name }}</span>
                        @empty
                            <span>undefined</span>
                        @endforelse
                        </td>
                        <td>{{ $project->is_closed ? 'Closed' : 'Ongoing' }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-eye fa-lg"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pencil fa-lg"></i></a>

                            @include('admin.partials.delete-form')

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-75 my-2">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
