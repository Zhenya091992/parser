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
                <th scope="col">Id</th>
                @foreach($category->components_category as $name => $value)
                    <th scope="col">{{ $name }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($data as $unit)
                <tr>
                    <th>{{ $unit->id }}</th>
                    @foreach($unit->value as $unitName => $unitValue)
                        <td>{{ $unitValue }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
