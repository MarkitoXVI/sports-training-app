@extends('layouts.app')

@section('title', 'Create Workout')

@section('content')
<style>
    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 2rem;
        color: #2d3748;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.95);
        padding: 2rem;
        border-radius: 20px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-align: center;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #4a5568;
    }

    input, textarea, select {
        width: 100%;
        padding: 0.8rem 1rem;
        border-radius: 10px;
        border: 1px solid #cbd5e0;
        margin-bottom: 1.5rem;
        font-size: 1rem;
        background: #f7fafc;
        transition: border-color 0.3s ease;
    }

    input:focus, textarea:focus, select:focus {
        border-color: #667eea;
        outline: none;
        background: #fff;
    }

    .submit-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.9rem 2rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .fixed-back-button {
        position: fixed;
        top: 1rem;
        left: 1rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: background 0.3s ease, transform 0.2s ease;
        z-index: 1001;
    }

    .fixed-back-button:hover {
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
        transform: translateY(-2px);
    }
</style>

<a href="{{ url()->previous() }}" class="fixed-back-button">
    <span class="back-icon">&#8592;</span> Back
</a>

<div class="form-container">
    <h1 class="form-title">Create New Workout</h1>

    <form action="{{ route('workouts.store') }}" method="POST">
        @csrf

        <label for="title">Workout Title</label>
        <input type="text" id="title" name="title" placeholder="e.g. Strength Circuit" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Write workout description..." required></textarea>

        <label for="duration">Duration (e.g. 30 mins)</label>
        <input type="text" id="duration" name="duration" placeholder="e.g. 30 mins" required>

        <label for="sport">Sport</label>
        <select id="sport" name="sport" required>
            <option value="">Select Sport</option>
            <option value="football">Football</option>
            <option value="basketball">Basketball</option>
            <option value="swimming">Swimming</option>
            <option value="tennis">Tennis</option>
            <!-- Add more sports here -->
        </select>

        <label for="difficulty">Difficulty (1-5)</label>
        <select id="difficulty" name="difficulty" required>
            <option value="">Select Difficulty</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <button type="submit" class="submit-btn">Save Workout</button>
    </form>
</div>
@endsection
