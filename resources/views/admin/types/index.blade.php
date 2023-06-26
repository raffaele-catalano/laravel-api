@extends('layouts.admin')

@section('content')
    <h3 class="text-center my-3">Project Types</h3>
    <div class="container d-flex flex-column align-items-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Projects Involved</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $types as $type )
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ count($type->projects) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
