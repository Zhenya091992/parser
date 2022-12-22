@extends('Category.mainCategory')

@section('title')
    Create category
@endsection

@section('breadcrumbs')
    @include('breadcrumbs')
@endsection

@if($errors->any())
    @section('errs')
        @foreach($errors->all() as $err)
            <div class="alert alert-warning" role="alert">
                {{ $err }}
            </div>
        @endforeach
    @endsection
@endif


@section('content')
    <form action="{{ route('Category.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">category</span>
            <input type="text" class="form-control" name="nameCategory" value="{{ old('nameCategory') ?? '' }}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">url</span>
            <input type="text" class="form-control" name="url" value="{{ old('url') ?? ''}}">
        </div>
        <div class="input-group input_fields_wrap">
            <span class="input-group-text" id="inputGroup-sizing-default">param</span>
            <input type="text" class="form-control" id="param" name="param[]" value="{{ old('param')[0] ?? ''}}">
            <span class="input-group-text" id="inputGroup-sizing-default">value</span>
            <input type="text" class="form-control" id="value" name="value[]" value="{{ old('value')[0] ?? ''}}">
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
