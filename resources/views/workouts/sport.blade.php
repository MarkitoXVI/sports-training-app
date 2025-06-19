<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ ucfirst($sport) }} Workouts</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .animated-bg {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            opacity: 0.1;
        }

        .bg-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: floatShape 8s ease-in-out infinite;
        }

        .bg-shape:nth-child(1) {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .bg-shape:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 70%;
            right: 10%;
            animation-delay: 3s;
        }

        .bg-shape:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 15%;
            animation-delay: 6s;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.1; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 0.2; }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .header-section {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .sport-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: bounceIcon 2s ease-in-out infinite;
        }

        @keyframes bounceIcon {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        .page-title {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
        }

        .workout-count {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .workouts-grid {
            display: grid;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .workout-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
            animation: slideInUp 0.6s ease-out forwards;
        }

        .workout-card:nth-child(1) { animation-delay: 0.1s; }
        .workout-card:nth-child(2) { animation-delay: 0.2s; }
        .workout-card:nth-child(3) { animation-delay: 0.3s; }
        .workout-card:nth-child(4) { animation-delay: 0.4s; }
        .workout-card:nth-child(5) { animation-delay: 0.5s; }
        .workout-card:nth-child(6) { animation-delay: 0.6s; }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .workout-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .workout-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            transform: scaleX(0);
            transition: transform 0.3s ease;
            border-radius: 20px 20px 0 0;
        }

        .workout-card:hover::before {
            transform: scaleX(1);
        }

        .workout-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .workout-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #2d3748, #4a5568);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .workout-duration {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .duration-icon {
            font-size: 1rem;
        }

        .workout-description {
            color: #718096;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .workout-features {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .feature-tag {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .workout-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .start-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .start-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .difficulty-indicator {
            display: flex;
            gap: 0.2rem;
            align-items: center;
        }

        .difficulty-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #e2e8f0;
        }

        .difficulty-dot.active {
            background: #f7931e;
        }

        .no-workouts {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .no-workouts-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .no-workouts-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            font-weight: 300;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            color: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .back-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .back-button:hover .back-icon {
            transform: translateX(-3px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .workout-card {
                padding: 1.5rem;
            }
            
            .workout-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .workout-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .start-btn {
                justify-content: center;
            }
        }

        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            z-index: 1000;
            transition: width 0.3s ease;
        }

        .fixed-back-button {
    position: fixed;
    top: 1rem;
    left: 1rem;
    z-index: 1001;
}

.fixed-create-button {
    position: fixed;
    top: 1rem;
    right: 1rem;
    z-index: 1001;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    color: #fff;
    padding: 0.8rem 1.5rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.fixed-create-button:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

    </style>
</head>
<body>
    <div class="animated-bg">
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
    </div>

    <a href="{{ url()->previous() }}" class="back-button fixed-back-button">
    <span class="back-icon">&#8592;</span> Back
</a>

<a href="{{ route('workouts.create') }}" class="back-button fixed-back-button" style="top: 4.5rem; background: rgba(102, 126, 234, 0.15);">
    ➕ Create Workout
</a>



    <div class="container">
        <header class="header-section">
            <div class="sport-icon">🏆</div>
            <h1 class="page-title">{{ ucfirst($sport) }} Workouts</h1>
            <p class="workout-count">{{ is_countable($workouts) ? count($workouts) : 0 }} workouts available</p>
        </header>

        @if(count($workouts) > 0)
            <div class="workouts-grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
                @foreach($workouts as $workout)
                    <div class="workout-card">
                        <div class="workout-header">
                            <h3 class="workout-title">{{ $workout['title'] ?? 'Untitled workout' }}</h3>
                            @if(!empty($workout['duration']))
                                <div class="workout-duration">
                                    <span class="duration-icon">⏱️</span>
                                    <span>{{ $workout['duration'] }}</span>
                                </div>
                            @endif
                        </div>
                        <p class="workout-description">{{ $workout['description'] ?? 'No description available.' }}</p>

                        {{-- Example feature tags, assuming $workout['features'] is array --}}
                        @if(!empty($workout['features']))
                            <div class="workout-features">
                                @foreach($workout['features'] as $feature)
                                    <span class="feature-tag">{{ $feature }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div class="workout-actions">
<a href="#" class="start-btn">Start Workout</a>


                            {{-- Difficulty indicator example --}}
                            @if(!empty($workout['difficulty']))
                                <div class="difficulty-indicator" aria-label="Difficulty level">
                                    @for($i = 1; $i <= 5; $i++)
                                        <div class="difficulty-dot {{ $i <= $workout['difficulty'] ? 'active' : '' }}"></div>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-workouts">
                <div class="no-workouts-icon">😞</div>
                <p class="no-workouts-text">No workouts found for this sport.</p>
            </div>
        @endif
    </div>
    
</body>
</html>

