@extends('layouts.app')

@section('title', 'Pro Athlete Challenges')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-6">Pro Athlete Challenges</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($challenges as $challenge)
<div class="challenge-card">
    <img src="{{ asset($challenge->athlete_image) }}" alt="{{ $challenge->athlete_name }}">

    <h2>{{ $challenge->title }}</h2>
    <p>{{ $challenge->description }}</p>

    <form action="{{ route('challenges.accept', $challenge->id) }}" method="POST">
        @csrf
        <button type="submit" class="accept-button">Accept Challenge</button>
    </form>
</div>
@endforeach

    </div>
</div>

<script>
    document.querySelectorAll('.accept-button').forEach(button => {
        button.addEventListener('click', () => {
            alert("Challenge Accepted! (coming soon)");
        });
    });
</script>
@endsection
