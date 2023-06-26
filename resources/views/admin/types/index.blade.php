@extends('layouts.admin')

@section('content')
    <h3 class="text-center my-3">Project Types</h3>
    <div class="container d-flex flex-column align-items-center w-50">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col-3">Name</th>
                    <th class="text-center" scope="col-4">Number of Projects of this Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $types as $type )
                <tr>
                    <td>{{ $type->name }}</td>
                    <td class="text-center">{{ count($type->projects) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
