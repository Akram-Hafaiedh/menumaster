<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Create New Category</h1>

    <form action="{{ route('categories.store') }}" method="post" class="max-w-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-600 text-sm font-semibold mb-2">Name:</label>
            <input type="text" name="name" id="name"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Category</button>
    </form>
</div>
@endsection