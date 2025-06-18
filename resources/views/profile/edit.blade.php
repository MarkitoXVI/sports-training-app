<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | SportFlex</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a2a6c;
            --secondary: #b21f1f;
            --accent: #fdbb2d;
            --light-bg: #f5f7fa;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: var(--light-bg);
            color: #333;
        }
        
        .profile-header {
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
            color: var(--primary);
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
            color: var(--primary);
        }
        
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .profile-card-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .profile-card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--primary);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        input, select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 42, 108, 0.1);
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: #152052;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background: #bb2d3b;
            transform: translateY(-2px);
        }
        
        .avatar-section {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 600;
            margin-right: 20px;
        }
        
        .avatar-upload {
            display: flex;
            flex-direction: column;
        }
        
        .text-muted {
            color: #666;
            font-size: 0.9rem;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .success-message {
            color: #28a745;
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="profile-header">
        <div class="logo">SportFlex</div>
        <div class="nav-links">
            <a href="#" class="nav-link">Dashboard</a>
            <a href="#" class="nav-link">Workouts</a>
            <a href="#" class="nav-link">Progress</a>
            <a href="#" class="nav-link">Profile</a>
        </div>
    </div>

    <div class="profile-container">
        <!-- Update Profile Information -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2 class="profile-card-title">Profile Information</h2>
            </div>
            
            <div class="avatar-section">
                <div class="avatar">JS</div>
                <div class="avatar-upload">
                    <input type="file" id="avatar" style="display: none;">
                    <button type="button" class="btn" style="background: #eee; margin-bottom: 5px;">Upload New Photo</button>
                    <span class="text-muted">JPG, GIF or PNG. Max size 2MB</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus>
                    @if ($errors->has('name'))
                        <div class="error-message">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="sports">Favorite Sports</label>
                    <select id="sports" name="sports">
                        <option value="running">Running</option>
                        <option value="cycling">Cycling</option>
                        <option value="swimming">Swimming</option>
                        <option value="basketball">Basketball</option>
                        <option value="soccer">Soccer</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Save Changes</button>
                
                @if (session('status') === 'profile-updated')
                    <div class="success-message">Profile updated successfully!</div>
                @endif
            </form>
        </div>
        
        <!-- Update Password -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2 class="profile-card-title">Update Password</h2>
            </div>
            
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input id="current_password" name="current_password" type="password" required>
                    @if ($errors->has('current_password'))
                        <div class="error-message">{{ $errors->first('current_password') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" name="password" type="password" required>
                    @if ($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Password</button>
                
                @if (session('status') === 'password-updated')
                    <div class="success-message">Password updated successfully!</div>
                @endif
            </form>
        </div>
        
        <!-- Delete Account -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2 class="profile-card-title">Delete Account</h2>
            </div>
            
            <p style="margin-bottom: 20px;">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                
                <div class="form-group">
                    <label for="password">Enter your password to confirm</label>
                    <input id="password" name="password" type="password" required>
                    @if ($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
</body>
</html>