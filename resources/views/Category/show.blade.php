@extends('Category.mainCategory')

@section('title')
    Сategory {{ $category->name_category }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('Category.show', $category) }}
@endsection

@section('content')

    <div class="shadow-lg table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Param</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
            <tbody>
            @foreach($parseData as $param => $value)
                <tr>
                    <th>{{ $param }}</th>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
