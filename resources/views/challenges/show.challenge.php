@extends('layouts.app')

@section('title', $challenge->title)

@section('content')
<div class="container py-5 text-center">
    <h1 class="mb-4">{{ $challenge->title }}</h1>
    <img src="{{ asset($challenge->athlete_image) }}" 
         alt="{{ $challenge->athlete_name }}" 
         style="max-width: 400px; border-radius: 12px;">

    <h4 class="mt-3 text-muted">by {{ $challenge->athlete_name }}</h4>

    <p class="mt-4">{{ $challenge->description }}</p>

    <p><strong>Difficulty:</strong> {{ ucfirst($challenge->difficulty) }}</p>

    <a href="{{ route('challenges.index') }}" class="btn btn-secondary mt-3">← Back to Challenges</a>

    <button class="btn btn-primary mt-3" onclick="alert('Workout Started! (Coming soon)')">Start Workout</button>
</div>
@endsection
