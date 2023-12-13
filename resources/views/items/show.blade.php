<!-- resources/views/items/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Item Details</h1>

    <div class="mb-4">
        <strong>Name:</strong> {{ $item->name }}
    </div>

    <div class="mb-4">
        <strong>Category:</strong> {{ $item->category->name }}
    </div>

    <div class="mb-4">
        <strong>Quantity:</strong> {{ $item->quantity }}
    </div>

    <div class="mb-4">
        <strong>Calories:</strong> {{ $item->calories }}
    </div>

    <div class="flex">
        <a href="{{ route('items.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

        <form action="{{ route('items.destroy', $item->id) }}" method="post" style="margin-left: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
@endsection