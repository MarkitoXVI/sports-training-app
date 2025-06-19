@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Add Workout for {{ ucfirst($sport) }}</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('workouts.store', $sport) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block font-semibold mb-1">Workout Title <span class="text-red-600">*</span></label>
            <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description" class="block font-semibold mb-1">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="image" class="block font-semibold mb-1">Workout Image (optional)</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-black rounded px-4 py-2 hover:bg-blue-700 transition">
                Add Workout
            </button>
            <a href="{{ route('workouts.sport', $sport) }}" class="ml-4 text-blue-600 underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
