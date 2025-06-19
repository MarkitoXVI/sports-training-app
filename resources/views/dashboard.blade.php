@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
        color: #2d3748;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .dashboard-subtitle {
        color: #718096;
        font-size: 1.1rem;
        margin-top: 0.5rem;
    }

    .dashboard-section {
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #4a5568;
        margin-bottom: 1rem;
    }

    .challenge-card {
        display: flex;
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .challenge-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .athlete-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .challenge-details {
        padding: 1rem 1.5rem;
        flex: 1;
    }

    .challenge-details h3 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .challenge-details p {
        color: #555;
        font-size: 0.95rem;
    }

    .accepted {
        border-left: 6px solid #f6ad55;
    }

    .completed {
        border-left: 6px solid #48bb78;
    }

    .btn-complete {
        background: linear-gradient(135deg, #48bb78, #38a169);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        margin-top: 0.75rem;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-complete:hover {
        background: linear-gradient(135deg, #38a169, #2f855a);
    }

    .empty-state {
        color: #718096;
        font-style: italic;
        margin-top: 1rem;
    }

    @media (max-width: 768px) {
        .challenge-card {
            flex-direction: column;
        }
        .athlete-image {
            width: 100%;
            height: 200px;
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1 class="dashboard-title">🏆 Your Challenges</h1>
        <p class="dashboard-subtitle">Track your progress, smash your goals.</p>
    </div>

    <div class="dashboard-section">
        <h2 class="section-title">📌 Accepted Challenges</h2>
        @forelse($accepted as $progress)
            <div class="challenge-card accepted">
                <img src="{{ asset($progress->challenge->athlete_image) }}" alt="{{ $progress->challenge->athlete_name }}" class="athlete-image">

                <div class="challenge-details">
                    <h3>{{ $progress->challenge->title }}</h3>
                    <p>{{ $progress->challenge->description }}</p>

                    <form action="{{ route('challenges.complete', $progress->challenge->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-complete">Mark as Completed</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="empty-state">No challenges accepted yet. Go explore and accept some!</p>
        @endforelse
    </div>

    <div class="dashboard-section">
        <h2 class="section-title">✅ Completed Challenges</h2>
        @forelse($completed as $progress)
            <div class="challenge-card completed">
                <img src="{{ asset($progress->challenge->athlete_image) }}" alt="{{ $progress->challenge->athlete_name }}" class="athlete-image">

                <div class="challenge-details">
                    <h3>{{ $progress->challenge->title }}</h3>
                    <p>{{ $progress->challenge->description }}</p>
                </div>
            </div>
        @empty
            <p class="empty-state">No completed challenges yet. Finish strong!</p>
        @endforelse
    </div>
</div>
@endsection
