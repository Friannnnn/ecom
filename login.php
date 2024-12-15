

<?php
require_once 'vendor/autoload.php';

session_start();

$googleClient = new Google_Client();
$googleClient->setClientId('320054654260-fcptfeujln15q5biepe21obl7q2bkvr3.apps.googleusercontent.com');
$googleClient->setClientSecret('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');
$googleClient->setRedirectUri('http://localhost/ecom/callback.php');
$googleClient->addScope('email');
$googleClient->addScope('profile');

if (isset($_SESSION['name'])) {
    
    header("location: profile.php");

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaisermark Powertools - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            height: 80px;
            display: flex;
            align-items: center;
            padding: 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-link {
            padding: 0 15px;
            font-size: 14px;
        }

        .icon-spacing {
            padding-left: 15px;
        }

        .form-container {
            margin-top: 50px;
        }

        .form-control {
            height: 45px;
            font-size: 14px;
            border-radius: 0;
            border: 1px solid #ccc;
            box-shadow: none;
            margin-bottom: 25px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group label {
            position: absolute;
            left: 12px;
            top: 14px;
            font-size: 14px;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .form-group input {
            padding-left: 10px;
            padding-right: 10px;
        }

        .form-group input:focus {
            padding-left: 10px;
            padding-right: 10px;
        }

        .form-control:focus::placeholder {
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .form-control:not(:placeholder-shown) ~ label,
        .form-control:focus ~ label {
            top: -18px;
            font-size: 12px;
            color: #555;
        }

        .btn-create {
            position: relative;
            display: inline-block;
            height: 50px;
            font-size: 14px;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            background-color: transparent;
            border: 1px solid rgb(28, 31, 30);
            overflow: hidden;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .btn-create::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            transition: top 0.3s ease;
            z-index: 0;
        }

        .btn-create:hover::before {
            top: 0;
        }

        .btn-create:hover {
            color: white;
        }

        .btn-create span {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 15px 20px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            z-index: 1;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 25px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ccc;
        }

        .divider::before {
            margin-right: .5em;
        }

        .divider::after {
            margin-left: .5em;
        }

        .google-btn {
            position: relative;
            display: inline-block;
            width: 100%;
            background-color: transparent;
            border: 1px solid rgb(28, 31, 30);
            overflow: hidden;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .google-btn a {
        color: inherit;
        text-decoration: none;
    }
    

        .google-btn span {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 15px 20px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            z-index: 1;
        }

        .google-btn::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            transition: top 0.3s ease;
            z-index: 0;
        }

        .google-btn:hover::before {
            top: 0;
        }

        .google-btn:hover {
            color: white;
        }

        .login-link {
            display: inline-block;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
            color: #000;
            text-decoration: none;
        }

        .login-link:hover {
            color: #000;
            text-decoration: underline;
        }

        .bi-google {
            position: relative;
            right: 20px;
        }

        .eye-icon {
            position: absolute;
            right: 12px;
            top: 15px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            font-size: 12px;
            display: none;
        }

        @media (max-width: 576px) {
            body {
                overflow: visible;
            }
            .navbar-brand {
                display: block;
                position: relative;
                left: auto;
                transform: translateX(0);
                margin: auto;
            }
            .nav-link {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-white position-relative">
            <div class="container d-flex justify-content-center align-items-center">
                <a class="navbar-brand" href="#">KAISERMARK POWERTOOLS</a>
            </div>
        </nav>
        <div class="container form-container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form id="loginForm">
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" placeholder=" " required>
                            <label>Email</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="password" class="form-control" placeholder=" " required>
                            <label>Password</label>
                            <i class="bi bi-eye eye-icon" id="toggle-password" onclick="togglePassword()"></i>
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-create">
                                <span>Log In</span>
                            </button>
                        </div>
                        <div class="divider">or</div>
                    </form>
                    <button class="google-btn">
    <a href="<?php echo htmlspecialchars($googleClient->createAuthUrl()); ?>" style="text-decoration:none;">
        <span><i class="bi bi-google"></i>Sign in with Google</span>
    </a>
</button>
                    <p class="text-center mt-3">Don't have an account? <a href="register.php" class="login-link">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const icon = document.getElementById('toggle-password');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.add('bi-eye-slash');
                icon.classList.remove('bi-eye');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>
