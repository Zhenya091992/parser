@extends('main')

@section('title')
    Main
@endsection

@section('content')
    @foreach($categories as $category)
        <div class="card">
            <div class="card-header">
                {{ $category->name_category }}
            </div>
            <div class="card-body">
                <a href="{{ route('show', ['id' => $category->id]) }}" class="btn btn-primary">Show</a>
            </div>
        </div>
    @endforeach
@endsection
