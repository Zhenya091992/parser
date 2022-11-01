@extends('Category.mainCategory')

@section('title')
    Category
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('cabinet', $user->name) }}
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

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>name_category</td>
                <td>url</td>
                <td>components_category</td>
                <td>created_at</td>
                <td>updated_at</td>
                <td>action</td>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection
