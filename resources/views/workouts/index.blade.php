<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Choose Your Sport</title>
    <style>
        /* Your existing styles here, including the ones you posted */
        /* ... */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .hero-section {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .main-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 50px rgba(255, 255, 255, 0.3);
            margin-bottom: 1rem;
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            0% {
                filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.3));
            }
            100% {
                filter: drop-shadow(0 0 40px rgba(255, 255, 255, 0.6));
            }
        }

        .subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .sports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .sport-card {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transform: translateY(0);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
        }

        .sport-card:nth-child(1) {
            animation-delay: 0.1s;
        }
        .sport-card:nth-child(2) {
            animation-delay: 0.2s;
        }
        .sport-card:nth-child(3) {
            animation-delay: 0.3s;
        }
        .sport-card:nth-child(4) {
            animation-delay: 0.4s;
        }
        .sport-card:nth-child(5) {
            animation-delay: 0.5s;
        }
        .sport-card:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sport-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .card-image {
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .basketball .card-image {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
        }
        .football .card-image {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }
        .hockey .card-image {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        .volleyball .card-image {
            background: linear-gradient(135deg, #f093fb, #f5576c);
        }
        .cycling .card-image {
            background: linear-gradient(135deg, #4ecdc4, #44a08d);
        }
        .tennis .card-image {
            background: linear-gradient(135deg, #fa709a, #fee140);
        }

        .sport-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            z-index: 2;
            color: white;
            text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .sport-card:hover .sport-icon {
            transform: translate(-50%, -50%) scale(1.1) rotate(5deg);
        }

        .card-content {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            position: relative;
        }

        .sport-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #2d3748, #4a5568);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sport-description {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.6;
            font-weight: 400;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .sports-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .main-title {
                font-size: 2.5rem;
            }
        }
            .back-button {
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            background: rgba(0, 0, 0, 0.3);
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
            z-index: 1001;
        }

    </style>
</head>
<body>

<a href="/dashboard" class="back-button fixed-back-button">
    <span class="back-icon">&#8592;</span> Back
</a>
    <div class="container">
        <div class="hero-section">
            <h1 class="main-title">Choose Your Sport</h1>
            <p class="subtitle">Discover your passion and elevate your game</p>
        </div>

        <div class="sports-grid">
            <div class="sport-card basketball" data-sport="basketball">
                <div class="card-image">
                    <div class="sport-icon">🏀</div>
                </div>
                <div class="card-content">
                    <h2 class="sport-name">Basketball</h2>
                    <p class="sport-description">Improve your dribbling, shooting, and teamwork on the court.</p>
                </div>
            </div>

            <div class="sport-card football" data-sport="football">
                <div class="card-image">
                    <div class="sport-icon">⚽</div>
                </div>
                <div class="card-content">
                    <h2 class="sport-name">Football</h2>
                    <p class="sport-description">Train your passing, kicking, and endurance for the field.</p>
                </div>
            </div>

            <div class="sport-card hockey" data-sport="hockey">
                <div class="card-image">
                    <div class="sport-icon">🏒</div>
                </div>
                <div class="card-content">
                    <h2 class="sport-name">Hockey</h2>
                    <p class="sport-description">Build stamina and speed with structured running workouts.</p>
                </div>
            </div>

            <div class="sport-card volleyball" data-sport="volleyball">
                <div class="card-image">
                    <div class="sport-icon">🏐</div>
                </div>
                <div class="card-content">
                    <h2 class="sport-name">Volleyball</h2>
                    <p class="sport-description">Enhance your technique and cardiovascular health in the pool.</p>
                </div>
            </div>

            <div class="sport-card cycling" data-sport="cycling">
                <div class="card-image">
                    <div class="sport-icon">🚴</div>
                </div>
                <div class="card-content">
                    <h2 class="sport-name">Cycling</h2>
                    <p class="sport-description">Boost your leg strength and endurance on two wheels.</p>
                </div>
            </div>

            <div class="sport-card tennis" data-sport="tennis">
                <div class="card-image">
                    <div class="sport-icon">🎾</div>
                </div>
                <div class="card-content">
                    <h2 class="sport-name">Tennis</h2>
                    <p class="sport-description">Focus on strength training and overall fitness.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Redirect on card click using data-sport attribute
        document.querySelectorAll('.sport-card').forEach(card => {
            card.addEventListener('click', () => {
                const sport = card.dataset.sport;
                window.location.href = `/workouts/sport/${sport}`;
            });
        });

        // Optional: Add subtle tilt effect on mouse move
        document.querySelectorAll('.sport-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left; // mouse x inside card
                const y = e.clientY - rect.top;  // mouse y inside card
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const deltaX = (x - centerX) / centerX;
                const deltaY = (y - centerY) / centerY;

                card.style.transform = `translateY(-10px) scale(1.05) rotateX(${deltaY * 8}deg) rotateY(${deltaX * 8}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1) rotateX(0) rotateY(0)';
            });
        });
    </script>
</body>
</html>
