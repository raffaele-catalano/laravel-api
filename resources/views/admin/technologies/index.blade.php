@extends('layouts.admin')

@section('content')
    <h3 class="text-center my-3">Project Technologies</h3>
    <div class="container d-flex flex-column align-items-center w-50">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col-4">Name</th>
                    <th class="text-center" scope="col-6">Number of Projects Including These Technologies</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $technologies as $technology )
                <tr>
                    <td>{{ $technology->name }}</td>
                    <td class="text-center">{{ count($technology->projects) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
