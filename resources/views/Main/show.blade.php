@extends('main')

@section('title')
    {{ $category->name_category }}
@endsection

@section('content')
    @foreach($dataOfCategory as $param => $value)
        <div class="card">
            <div class="card-header">
                {{ $param }} = {{ $value }}
            </div>
        </div>
    @endforeach
@endsection
