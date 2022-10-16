@extends('Category.mainCategory')

@section('title')
    Сategory {{ $category->name_category }}
@endsection

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Param</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->components_category as $param => $value)
            <tr>
                <th>{{ $param }}</th>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
