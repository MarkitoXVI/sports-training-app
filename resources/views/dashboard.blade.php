<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SportFlex</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #333;
        }
        
        .dashboard-header {
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a2a6c;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
        }
        
        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #1a2a6c;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .welcome-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .welcome-message {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stat-title {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a2a6c;
        }
        
        .quick-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            background: #1a2a6c;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .action-btn:hover {
            background: #152052;
            transform: translateY(-2px);
        }
        
        .action-btn.secondary {
            background: white;
            color: #1a2a6c;
            border: 1px solid #1a2a6c;
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <div class="logo">SportFlex</div>
        <div class="nav-links">
            <a href="/dashboard" class="nav-link">Dashboard</a>
            <a href="/workouts" class="nav-link">Workouts</a>
            <a href="/progress" class="nav-link">Progress</a>
            <a href="/profile" class="nav-link">Profile</a>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="welcome-card">
            <h1 class="welcome-title">Welcome Back, Athlete!</h1>
            <p class="welcome-message">Ready for your next training session? Check your stats below.</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Weekly Workouts</div>
                <div class="stat-value">4</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Active Streak</div>
                <div class="stat-value">12 days</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Calories Burned</div>
                <div class="stat-value">3,450</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Sports Played</div>
                <div class="stat-value">3</div>
            </div>
        </div>
        
        <div class="quick-actions">
            <a href="#" class="action-btn">Start New Workout</a>
            <a href="#" class="action-btn secondary">View Progress</a>
            <a href="#" class="action-btn secondary">Join Challenge</a>
        </div>
    </div>
</body>
</html>