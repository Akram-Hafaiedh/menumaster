<!-- resources/views/items/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Items</h1>

    <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Item</a>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Calories</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td class="border text-center px-4 py-2">{{ $item->id }}</td>
                <td class="border text-center px-4 py-2">{{ $item->name }}</td>
                <td class="border text-center px-4 py-2">{{ $item->category->name }}</td>
                <td class="border text-center px-4 py-2">{{ $item->quantity }}</td>
                <td class="border text-center px-4 py-2">{{ $item->calories }}</td>
                <td class="border text-center px-4 py-2">
                    <a href="{{ route('items.show', $item->id) }}"
                        class="bg-blue-500 text-sm text-white px-2 py-1 rounded">View</a>
                    <a href="{{ route('items.edit', $item->id) }}"
                        class="bg-yellow-500 text-sm text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="post" style="display:inline;"
                        class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-sm text-white px-2 py-1 rounded"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection