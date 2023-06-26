@extends('layouts.admin')

@section('content')
    <h3 class="text-center mt-3">Add a New Project</h3>
        <div class="container">

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
            @endif

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name (*)</label>
                    <input
                        id="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        placeholder="Name"
                        type="text"
                    >
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        cols="30"
                        rows="10"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        name="description"
                        placeholder="Description"
                        type="text">{{old('description')}}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-1">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" onchange="showImage(event)" id="image" name="image" aria-describedby="upload" aria-label="Upload">
                    <div>
                        <img id="preview-image" class="mt-2" src="" alt="" width="150">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category (*)</label>
                    <input
                        id="category"
                        value="{{ old('category') }}"
                        class="form-control @error('category') is-invalid @enderror w-50"
                        name="category"
                        placeholder="Category"
                        type="text"
                    >
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date (*)</label>
                    <input
                        id="start_date"
                        value="{{ old('start_date') }}"
                        class="form-control @error('start_date') is-invalid @enderror w-25"
                        name="start_date"
                        placeholder="YYYY-MM-DD"
                        type="text"
                    >
                        @error('start_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input
                        id="end_date"
                        value="{{ old('end_date') }}"
                        class="form-control @error('end_date') is-invalid @enderror w-25"
                        name="end_date"
                        placeholder="YYYY-MM-DD"
                        type="text"
                    >
                        @error('end_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Project Type</label>
                    <select class="form-select w-25 @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                        <option value="" selected>Select a Type</option>
                        @foreach ($project_type as $type)
                            <option value="{{ $type->id }}" @if($type->id == old('type_id')) selected @endif>{{$type->name}}</option>
                        @endforeach
                    </select>
                        @error('type_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="Technologies" class="form-label d-block">Technologies</label>
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                        @foreach ($project_technology as $technology)
                    <input
                        type="checkbox"
                        class="btn-check"
                        id="technology{{$loop->iteration}}"
                        value="{{$technology->id}}"
                        name="technologies[]"
                        autocomplete="off"
                        @if (in_array($technology->id, old('technologies', [])))
                            checked
                        @endif
                        >
                    <label class="btn btn-outline-primary" for="technology{{$loop->iteration}}">{{ $technology->name }}</label>
                @endforeach

                    </div>
                </div>

                <div class="mb-3">
                    <label for="is_closed" class="form-label">Status</label>
                    <select class="form-select w-25 @error('is_closed') is-invalid @enderror" name="is_closed" id="is_closed">
                        <option value="" selected>Select a Status</option>
                        <option value="0">Ongoing</option>
                        <option value="1">Closed</option>
                    </select>
                        @error('is_closed')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>



                <div class="btn-container d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>

        <script>
            ClassicEditor
                .create( document.querySelector( '#description' ) )
                .catch( error => {
                    console.error( error );
                } );

                function showImage(event){
                    const tagImage = document.getElementById('preview-image');
                    tagImage.src = URL.createObjectURL(event.target.files[0])

                    console.log(event.target.files[0]);
                    console.log(URL.createObjectURL(event.target.files[0]));
                }
        </script>

@endsection
