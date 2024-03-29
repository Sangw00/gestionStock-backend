@extends("layouts.home")
@section("content")
    <div class="m-2 d-flex align-items-center">
        <h1 class="">All Categories</h1>
        <a href="{{ route("category.create") }}" class="btn btn-outline-secondary">New category</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><a href="{{ route("category.edit", ["category" => $category->id]) }}" class="btn btn-outline-secondary">
                <span class="material-symbols-outlined">edit</span>
                </a></td>
                <td>
                <form method="POST" action="{{route("category.delete", ["category" => $category->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit"  class="btn btn-outline-primary"><a href="{{ route("category.delete", ["category" => $category->id]) }}" >
                <span class="material-symbols-outlined">delete</span></button>
                </form>
                </td>
                <td><a href="{{ route("category.show", ["category" => $category->id]) }}" class="btn btn-outline-secondary">
                <span class="material-symbols-outlined">more</span>
                </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
