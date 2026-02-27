<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - OS Web Design</title>
    <link rel="stylesheet" href="Sign_in.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Layer elements for background -->
    <div class="yellow-bg"></div>
    <div class="trojan"></div>

    <!-- Back Button -->
    <button class="back-button" onclick="window.location.href='register.php'" title="Go to Register">
        <img src="assets/backBtn.png" alt="Back">
    </button>

    <div class="signin-container">
        <div class="signin-modal">
            <h2>Sign in</h2>
            
            <?php
            // Display error or success messages
            if (isset($_GET['error'])) {
                echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            if (isset($_GET['success'])) {
                echo '<div class="success-message">' . htmlspecialchars($_GET['success']) . '</div>';
            }
            ?>
            
            <form id="loginForm" method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Enter your username"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required
                    >
                </div>
                
                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                
                <button type="submit" class="signin-btn" name="login">Sign in</button>
            </form>
            
            <div class="social-divider">
                <span>or continue with</span>
            </div>
            
            <div class="social-login">
                <button type="button" class="social-btn" title="Google">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                </button>
                <button type="button" class="social-btn" title="Facebook">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#1877F2">
                        <path d="M24 12.073c0-5.373-6.627-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </button>
                <button type="button" class="social-btn" title="GitHub">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#000000">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </button>
            </div>
            
            <p class="register-link">
                Don't have an account? <a href="register.php">Sign up</a>
            </p>
        </div>
    </div>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        
        $errors = [];
        
        // Validate username
        if (empty($username)) {
            $errors[] = "Username is required";
        }
        
        // Validate password
        if (empty($password)) {
            $errors[] = "Password is required";
        }
        
        if (empty($errors)) {
            // For demo purposes - in production, validate against database
            // Here we just check if fields are not empty
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelector(".signin-modal").innerHTML = \'<div class="success-message" style="padding: 30px; font-size: 18px;">Login Successful! Welcome back, ' . htmlspecialchars($username) . '.</div><p style="text-align: center; margin-top: 20px;"><a href="login.php">Go to Dashboard</a></p>\';
                });
            </script>';
        }
    }
    ?>
    
    <script>
        // Client-side validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            let isValid = true;
            
            // Reset validation states
            username.classList.remove('error', 'success');
            password.classList.remove('error', 'success');
            
            if (username.value.trim() === '') {
                username.classList.add('error');
                isValid = false;
            } else {
                username.classList.add('success');
            }
            
            if (password.value === '') {
                password.classList.add('error');
                isValid = false;
            } else {
                password.classList.add('success');
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
