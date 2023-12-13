<!-- resources/views/createMenu.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Create Menu</h1>

    <form action="{{ route('generateMenu') }}" method="post" class="max-w-md">
        @csrf

        <div class="mb-4">
            <label for="calories" class="block text-gray-600 text-sm font-semibold mb-2">Enter Calorie Count:</label>
            <input type="number" name="calories" id="calories"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Generate Menu</button>
    </form>

    @if(isset($suggestions))
    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-2">Generated Suggestions</h2>

        @foreach($suggestions as $index => $suggestion)
        <div class="mb-4">
            <h3 class="text-lg font-semibold mb-2">Suggestion {{ $index + 1 }}</h3>
            <ul>
                @if(is_array($suggestion['items']))
                @foreach($suggestion['items'] as $item)
                <li>{{ $item['name'] }} - {{ $item['calories'] }} calories ({{ $item['quantity'] }} kg)</li>
                @endforeach
                @endif
            </ul>
            <p class="font-semibold">Total Calories: {{ $suggestion['totalCalories'] }}</p>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection