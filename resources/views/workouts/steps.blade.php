@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .steps-grid {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            margin-bottom: 3rem;
        }

        .step-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 24px;
            padding: 2.5rem 2rem 2rem 2rem;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.18);
            transition: all 0.3s, transform 0.2s;
            position: relative;
            overflow: hidden;
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            border-radius: 24px 24px 0 0;
            opacity: 0.7;
        }

        .step-card:hover {
            box-shadow: 0 16px 48px rgba(102, 126, 234, 0.28);
            transform: translateY(-6px) scale(1.02);
        }

        .step-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 0.7rem;
            background: linear-gradient(135deg, #2d3748, #4a5568);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .step-description {
            color: #718096;
            margin-bottom: 1.2rem;
            line-height: 1.6;
        }

        .step-meta {
            font-size: 1.05rem;
            color: #4a5568;
            margin-bottom: 0.4rem;
            background: rgba(102, 126, 234, 0.07);
            display: inline-block;
            padding: 0.2rem 0.8rem;
            border-radius: 12px;
            margin-right: 0.5rem;
        }


        .animated-bg {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            opacity: 0.13;
        }

        .bg-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
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

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.1;
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.2;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .step-card {
                padding: 1.2rem;
            }

            .steps-grid {
                gap: 1rem;
            }
        }



        .finish {
            margin-top: 2.5rem;
            text-align: center;
            color: #fff;
            border-radius: 20px;
            box-shadow: 0 6px 32px rgba(102, 126, 234, 0.13);
            padding: 2rem 1.5rem 2rem 1.5rem;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
            transition: box-shadow 0.2s;
        }

        .finish:hover {
            box-shadow: 0 12px 48px rgba(102, 126, 234, 0.22);
        }
    </style>
    <div class="animated-bg">
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
    </div>
    <div class="container">
        @if(count($steps) > 0)
            <h2 class="mb-4" style="color:white; font-weight:900; text-shadow:0 2px 16px #764ba2;">
                Workout Steps
            </h2>

            <div class="steps-grid">
                @foreach($steps as $step)
                    <div class="step-card">
                        <div class="step-meta"> {{ $step['order'] }}</div>
                        <div class="step-title">{{ $step['title'] }}</div>
                        <div class="step-description">{{ $step['description'] }}</div>
                        <div class="step-meta step-reps">Repetitions: <b>{{ $step['repetitions'] }}</b>
                        </div>
                        <div class="step-meta step-time">Time: <b>{{ $step['time'] }} sec</b></div>
                        <div class="step-meta step-time-rep">Average time per repetition:
                            <b>{{floor($step['time'] / $step['repetitions']) }} sec</b>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center finish" style="display: none;">
                <span style="font-weight: 700; font-size: 1.2rem; margin-bottom: 1rem; display: block;">
                    All steps completed! Great job!
                </span>
                <a href="{{ route('workouts.index') }}"
                    style="display: inline-block; background: linear-gradient(90deg, #667eea, #764ba2); color: white; font-weight: 700; padding: 0.7rem 1.6rem; border-radius: 16px; box-shadow: 0 4px 16px rgba(102,126,234,0.18); text-decoration: none; transition: background 0.2s, box-shadow 0.2s;"
                    onmouseover="this.style.background='linear-gradient(90deg,#ff6b35,#f7931e)'; this.style.boxShadow='0 8px 32px rgba(255,107,53,0.18)';"
                    onmouseout="this.style.background='linear-gradient(90deg,#667eea,#764ba2)'; this.style.boxShadow='0 4px 16px rgba(102,126,234,0.18)';">
                    View other workouts
                </a>
            </div>
        @else
            <div class="steps-card text-center" style="color: white;">
                <h2 class="mb-4" style="font-weight:900; text-shadow:0 2px 16px #764ba2; font-size:2rem; ">
                    <span
                        style="background: linear-gradient(135deg, #ff6b35, #f7931e); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        Weird, we couldn't find any steps for this workout!
                    </span>
                </h2>
                <p class="text-lg" style="color: #e2e8f0; margin-bottom: 1.5rem;">
                    It seems like this workout has no steps yet.
                </p>
                <a href="{{url()->previous()}}"
                    style="display: inline-block; background: linear-gradient(90deg, #667eea, #764ba2); color: white; font-weight: 700; padding: 0.7rem 1.6rem; border-radius: 16px; box-shadow: 0 4px 16px rgba(102,126,234,0.18); text-decoration: none; transition: background 0.2s, box-shadow 0.2s;"
                    onmouseover="this.style.background='linear-gradient(90deg,#ff6b35,#f7931e)'; this.style.boxShadow='0 8px 32px rgba(255,107,53,0.18)';"
                    onmouseout="this.style.background='linear-gradient(90deg,#667eea,#764ba2)'; this.style.boxShadow='0 4px 16px rgba(102,126,234,0.18)';">
                    View other workouts
                </a>
            </div>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Sort the cards by order
            const grid = document.querySelector('.steps-grid');
            const finish = document.querySelector('.finish');
            if (grid) {
                const cards = Array.from(grid.querySelectorAll('.step-card'));
                cards.sort((a, b) => {
                    const orderA = parseInt(a.querySelector('.step-meta').textContent.trim());
                    const orderB = parseInt(b.querySelector('.step-meta').textContent.trim());
                    return orderA - orderB;
                });
                cards.forEach(card => grid.appendChild(card));
            }

            if (grid) {
                const cards = Array.from(grid.querySelectorAll('.step-card'));
                let current = 0;

                // Add animation CSS
                const style = document.createElement('style');
                style.innerHTML = `
                                                        .slide-in-right {
                                                        animation: slideInRight 0.5s forwards;
                                                        }
                                                        .slide-out-left {
                                                        animation: slideOutLeft 0.5s forwards;
                                                        }
                                                        @keyframes slideInRight {
                                                        from { opacity: 0; transform: translateX(80px);}
                                                        to { opacity: 1; transform: translateX(0);}
                                                        }
                                                        @keyframes slideOutLeft {
                                                        from { opacity: 1; transform: translateX(0);}
                                                        to { opacity: 0; transform: translateX(-80px);}
                                                        }
                                                    `;
                document.head.appendChild(style);

                function showCard(index) {
                    cards.forEach((card, i) => {
                        card.style.display = i === index ? 'block' : 'none';
                        card.classList.remove('slide-in-right', 'slide-out-left');
                    });
                    if (cards[index]) {
                        cards[index].style.display = 'block';
                        cards[index].classList.add('slide-in-right');
                    }
                }

                function hideCard(index, callback) {
                    if (cards[index]) {
                        cards[index].classList.remove('slide-in-right');
                        cards[index].classList.add('slide-out-left');
                        cards[index].addEventListener('animationend', function handler() {
                            cards[index].removeEventListener('animationend', handler);
                            cards[index].style.display = 'none';
                            cards[index].classList.remove('slide-out-left');
                            if (callback) callback();
                        });
                    } else if (callback) {
                        callback();
                    }
                }

                function nextCard() {

                    if (current < cards.length) {
                        showCard(current);
                        const timeElem = cards[current].querySelector('.step-time b');
                        let seconds = 3; // fallback
                        if (timeElem) {
                            const match = timeElem.textContent.match(/\d+/);
                            if (match) seconds = parseInt(match[0]);
                        }
                        setTimeout(() => {
                            hideCard(current, () => {
                                current++;
                                nextCard();
                            });
                        }, seconds * 1);
                    } else
                        finish.style.display = 'block';
                }

                if (cards.length > 0) {
                    showCard(0);
                    nextCard();
                }
                if (cards.length <= current) {
                }
            }
        });
    </script>
@endsection