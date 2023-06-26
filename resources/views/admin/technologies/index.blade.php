@extends('layouts.admin')

@section('content')
    <h3 class="text-center my-3">Project Technologies</h3>
    <div class="container d-flex flex-column align-items-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Projects Involved</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $technologies as $technology )
                <tr>
                    <td>{{ $technology->name }}</td>
                    <td>{{ count($technology->projects) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
