<!-- resources/views/items/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-semibold mb-4">Edit Item</h1>

        <form action="{{ route('items.update', $item->id) }}" method="post" class="max-w-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-600 text-sm font-semibold mb-2">Name:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" value="{{ old('name', $item->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-gray-600 text-sm font-semibold mb-2">Category:</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-600 text-sm font-semibold mb-2">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" value="{{ old('quantity', $item->quantity) }}" required>
            </div>

            <div class="mb-4">
                <label for="calories" class="block text-gray-600 text-sm font-semibold mb-2">Calories:</label>
                <input type="number" name="calories" id="calories" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" value="{{ old('calories', $item->calories) }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Item</button>
        </form>
    </div>
@endsection
