@extends('Category.mainCategory')

@section('title')
    Create category
@endsection

@section('breadcrumbs')
    @include('breadcrumbs')
@endsection

@section('content')
    <form action="{{ route('Category.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">category</span>
            <input type="text" class="form-control" name="nameCategory">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">url</span>
            <input type="text" class="form-control" name="url">
        </div>
        <div class="input-group input_fields_wrap">
            <span class="input-group-text" id="inputGroup-sizing-default">param</span>
            <input type="text" class="form-control" id="param" name="param[]">
            <span class="input-group-text" id="inputGroup-sizing-default">value</span>
            <input type="text" class="form-control" id="value" name="value[]">
            <div class="input-group-append">
                <button class="btn btn-primary add_field_button">Add More Fields</button>
            </div>
        </div>
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script src="{{ Vite::asset('resources/js/createCategoryForm.js') }}"></script>
@endsection
