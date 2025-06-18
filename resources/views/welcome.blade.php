<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportFlex | Multi-Sport Training Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            color: white;
            text-align: center;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 0 20px;
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .tagline {
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 40px;
            max-width: 600px;
        }
        
        .buttons {
            display: flex;
            gap: 20px;
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: white;
            color: #1a2a6c;
        }
        
        .btn-secondary {
            border: 2px solid white;
            color: white;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .sport-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        
        .sport-icon {
            font-size: 2rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">SportFlex</div>
        <div class="tagline">Your all-in-one platform for multi-sport training. Track, improve, and dominate in every discipline.</div>
        
        <div class="buttons">
            <a href="/register" class="btn btn-primary">Get Started</a>
            <a href="/login" class="btn btn-secondary">Login</a>
        </div>
        
        <div class="sport-icons">
            <div class="sport-icon">⚽</div>
            <div class="sport-icon">🏀</div>
            <div class="sport-icon">🏃‍♂️</div>
            <div class="sport-icon">🏊‍♀️</div>
            <div class="sport-icon">🚴‍♂️</div>
            <div class="sport-icon">🏋️‍♀️</div>
        </div>
    </div>
</body>
</html>