@extends('Category.mainCategory')

@section('title')
    Edit category
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('Category.edit', $category) }}
@endsection

@section('content')
    <form action="{{ route('Category.update', ['Category' => $category->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">category</span>
            <input type="text" class="form-control" name="nameCategory" value="{{ $category->name_category }}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">url</span>
            <input type="text" class="form-control" name="url">
        </div>
        @php
            $counter = 0
        @endphp
        <div class="input-group-append">
            <button class="btn btn-primary add_field_button">Add More Fields</button>
        </div>
        <div class="input_fields_wrap">
            @foreach($category->components_category as $param => $value)
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">param</span>
                    <input type="text" class="form-control" id="param" name="param[{{ $counter }}]" value="{{ $param }}">
                    <span class="input-group-text" id="inputGroup-sizing-default">value</span>
                    <input type="text" class="form-control" id="value" name="value[{{ $counter++ }}]" value="{{ $value }}">
                </div>
            @endforeach
        </div>
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script src="{{ Vite::asset('resources/js/createCategoryForm.js') }}"></script>
@endsection
