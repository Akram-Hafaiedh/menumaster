<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Categories</h1>

    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Category</a>

    <table class="table mt-6">
        <thead>
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="border px-6 py-3">{{ $category->id }}</td>
                <td class="border px-6 py-3">{{ $category->name }}</td>
                <td class="border px-6 py-3">
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="bg-yellow-500 text-white px-2 py-1 text-sm rounded">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                        style="display:inline;" class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 text-sm rounded"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection