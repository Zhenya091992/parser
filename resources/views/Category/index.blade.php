@extends('Category.mainCategory')

@section('title')
    Category
@endsection

@section('content')
    <div class="container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>All the category</h1>
                </div>
                <div class="col text-end">
                    <a class="btn btn-success" href="{{ route('Category.create') }}">Add category</a>
                </div>
            </div>
        </div>


        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>name_category</td>
                <td>components_category</td>
                <td>created_at</td>
                <td>updated_at</td>
                <td>action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name_category }}</td>
                    <td>{{ $value->components_category }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td class="text-center">
                        @method('delete')
                        <a class="btn btn-small btn-success" href="{{ route('Category.show', ['Category' => $value->id])}}">Show</a>
                        <a class="btn btn-small btn-warning" href="{{ route('Category.edit', ['Category' => $value->id])}}">Edit</a>
                        <form method="post" action="{{ route('Category.destroy', ['Category' => $value->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-small btn-info">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
