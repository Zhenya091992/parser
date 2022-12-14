@extends('Category.mainCategory')

@section('title')
    Category
@endsection

@section('breadcrumbs')
    @include('breadcrumbs')
@endsection

@section('content')
    <div class="shadow-lg container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>All category</h1>
                </div>
                <div class="col text-end">
                    <a class="btn btn-success" href="{{ route('Category.create') }}">Add category</a>
                </div>
            </div>
        </div>

        @if(!empty($errsCrawl))
            <div class="accordion" id="accordionErrsCrawl">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed alert-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Errs crawling
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($errsCrawl as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>name_category</td>
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


    </div>
@endsection
