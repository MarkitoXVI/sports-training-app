@extends('layouts.app')

@section('title', 'Pro Athlete Challenges')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .challenges-container {
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
    
    .content-wrapper {
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
    
    .challenge-count {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        font-weight: 300;
        letter-spacing: 0.5px;
    }
    
    .challenges-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .challenge-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(255, 255, 255, 0.2);
        cursor: pointer;
        opacity: 0;
        transform: translateY(30px);
        animation: slideInUp 0.6s ease-out forwards;
    }
    
    .challenge-card:nth-child(1) { animation-delay: 0.1s; }
    .challenge-card:nth-child(2) { animation-delay: 0.2s; }
    .challenge-card:nth-child(3) { animation-delay: 0.3s; }
    .challenge-card:nth-child(4) { animation-delay: 0.4s; }
    .challenge-card:nth-child(5) { animation-delay: 0.5s; }
    .challenge-card:nth-child(6) { animation-delay: 0.6s; }
    
    @keyframes slideInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .challenge-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border-color: rgba(102, 126, 234, 0.3);
    }
    
    .challenge-card::before {
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
    
    .challenge-card:hover::before {
        transform: scaleX(1);
    }
    
    .athlete-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .challenge-card:hover .athlete-image {
        transform: scale(1.05);
    }
    
    .challenge-content {
        padding: 1.5rem;
    }
    
    .challenge-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }
    
    .challenge-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #2d3748, #4a5568);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .athlete-name {
        color: #667eea;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .athlete-name::before {
        content: '👤';
        font-size: 0.8rem;
    }
    
    .challenge-description {
        color: #718096;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }
    
    .challenge-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    
    .difficulty-badge {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 2px solid;
        transition: all 0.3s ease;
    }
    
    .difficulty-easy {
        background: linear-gradient(135deg, #48bb78, #38a169);
        color: white;
        border-color: #48bb78;
    }
    
    .difficulty-medium {
        background: linear-gradient(135deg, #ed8936, #dd6b20);
        color: white;
        border-color: #ed8936;
    }
    
    .difficulty-hard {
        background: linear-gradient(135deg, #e53e3e, #c53030);
        color: white;
        border-color: #e53e3e;
    }
    
    .accept-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }
    
    .accept-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }
    
    .accept-btn:active {
        transform: translateY(0);
    }
    
    .no-challenges {
        text-align: center;
        padding: 4rem 2rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .no-challenges-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .no-challenges-text {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.2rem;
        font-weight: 300;
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
    
    @media (max-width: 768px) {
        .content-wrapper {
            padding: 1rem;
        }
        
        .challenges-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .challenge-content {
            padding: 1.25rem;
        }
        
        .challenge-footer {
            flex-direction: column;
            align-items: stretch;
        }
        
        .accept-btn {
            justify-content: center;
        }

        /* BACK BUTTON STYLES */
    .fixed-back-button {
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.6rem 1rem;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        z-index: 1001;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .fixed-back-button:hover {
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
        transform: translateY(-2px);
    }

    .fixed-back-button .back-icon {
        font-size: 1.2rem;
    }
       
    }
    
    @keyframes sparkleFloat {
        0% {
            opacity: 1;
            transform: translateY(0px) scale(1);
        }
        100% {
            opacity: 0;
            transform: translateY(-30px) scale(0);
        }
    }
</style>

<div class="challenges-container">
    <div class="progress-bar" id="progressBar"></div>

<!-- ✅ BACK BUTTON -->
<a href="/dashboard" class="back-button fixed-back-button">
        <span class="back-icon">&#8592;</span> Back
    </a>
    
    <div class="animated-bg">
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
    </div>
    
    <div class="content-wrapper">
        <div class="header-section">
            <div class="sport-icon">🏅</div>
            <h1 class="page-title">Pro Athlete Challenges</h1>
            <p class="challenge-count">{{ count($challenges) }} elite challenges available</p>
        </div>
        
        @if(count($challenges) > 0)
            <div class="challenges-grid">
                @foreach ($challenges as $challenge)
                    <div class="challenge-card" onclick="acceptChallenge({{ $challenge->id }})">
                        @if ($challenge->athlete_image)
                            <img src="{{ asset($challenge->athlete_image) }}" 
                                 alt="{{ $challenge->athlete_name }}" 
                                 class="athlete-image">
                        @endif
                        
                        <div class="challenge-content">
                            <div class="challenge-header">
                                <div>
                                    <h2 class="challenge-title">{{ $challenge->title }}</h2>
                                    <p class="athlete-name">{{ $challenge->athlete_name }}</p>
                                </div>
                            </div>
                            
                            <p class="challenge-description">{{ $challenge->description }}</p>
                            
                            <div class="challenge-footer">
                                <span class="difficulty-badge difficulty-{{ strtolower($challenge->difficulty) }}">
                                    {{ ucfirst($challenge->difficulty) }}
                                </span>
                                <button class="accept-btn accept-button" data-id="{{ $challenge->id }}">
                                    <span>🚀</span>
                                    Accept Challenge
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-challenges">
                <div class="no-challenges-icon">🏆</div>
                <p class="no-challenges-text">No challenges available at the moment. Check back soon!</p>
            </div>
        @endif
    </div>
</div>

<script>
    // Scroll progress indicator
    window.addEventListener('scroll', () => {
        const scrollTop = document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const progress = (scrollTop / scrollHeight) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
    });

    // Challenge card interactions
    function acceptChallenge(challengeId) {
        const card = event.currentTarget;
        card.style.transform = 'translateY(-8px) scale(0.98)';
        
        setTimeout(() => {
            card.style.transform = 'translateY(-8px) scale(1)';
            console.log(`Accepting challenge: ${challengeId}`);
            // Your existing accept challenge logic here
            alert("Challenge Accepted! (coming soon)");
        }, 150);
    }

    // Enhanced hover effects
    document.querySelectorAll('.challenge-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.background = 'rgba(255, 255, 255, 0.98)';
            createSparkleEffect(card);
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.background = 'rgba(255, 255, 255, 0.95)';
        });
    });

    // Accept button event listeners
    document.querySelectorAll('.accept-button').forEach(button => {
        button.addEventListener('click', (e) => {
            e.stopPropagation();
            const challengeId = button.getAttribute('data-id');
            
            // Add button animation
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 100);
            
            // Your existing logic
            alert("Challenge Accepted! (coming soon)");
        });
    });

    // Sparkle effect function
    function createSparkleEffect(element) {
        const rect = element.getBoundingClientRect();
        const sparkleCount = 3;
        
        for (let i = 0; i < sparkleCount; i++) {
            setTimeout(() => {
                const x = rect.left + Math.random() * rect.width;
                const y = rect.top + Math.random() * rect.height;
                createSparkle(x, y);
            }, i * 100);
        }
    }

    function createSparkle(x, y) {
        const sparkle = document.createElement('div');
        sparkle.style.position = 'fixed';
        sparkle.style.left = x + 'px';
        sparkle.style.top = y + 'px';
        sparkle.style.width = '4px';
        sparkle.style.height = '4px';
        sparkle.style.background = '#f7931e';
        sparkle.style.borderRadius = '50%';
        sparkle.style.pointerEvents = 'none';
        sparkle.style.zIndex = '1000';
        sparkle.style.animation = 'sparkleFloat 1s ease-out forwards';
        
        document.body.appendChild(sparkle);
        
        setTimeout(() => {
            sparkle.remove();
        }, 1000);
    }

    // Intersection Observer for staggered animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    });

    document.querySelectorAll('.challenge-card').forEach(card => {
        observer.observe(card);
    });
</script>
@endsection