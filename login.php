<?php
require_once 'vendor/autoload.php';

session_start();

$googleClient = new Google_Client();
$googleClient->setClientId('320054654260-fcptfeujln15q5biepe21obl7q2bkvr3.apps.googleusercontent.com');
$googleClient->setClientSecret('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');
$googleClient->setRedirectUri('http://localhost/ecom/callback.php');
$googleClient->addScope('email');
$googleClient->addScope('profile');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaisermark Powertools - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        /* Add fade-up animation */
        .fade-up {
          animation: fadeUp 1s ease-in-out;
        }

        @keyframes fadeUp {
          0% {
            opacity: 0;
            transform: translateY(20px); /* Start slightly below */
          }
          100% {
            opacity: 1;
            transform: translateY(0); /* End at normal position */
          }
        }

        /* Google Button style changes */
        .google-btn a {
          color: inherit; /* Inherit color from the button */
          text-decoration: none; /* Remove text decoration */
        }

        .navbar {
            padding: 20px 0;
            border-bottom: 1px solid #eaeaea;
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
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 25px;
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .btn-create, .btn-outline-secondary, .google-btn {
            position: relative;
            display: inline-block;
            height: 50px;
            font-size: 14px;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48%;
            color: rgb(28, 31, 30);
            border: 1px solid rgb(28, 31, 30);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-create::before, .btn-outline-secondary::before, .google-btn::before {
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

        .btn-create:hover::before, .btn-outline-secondary:hover::before, .google-btn:hover::before {
            top: 0;
        }

        .btn-create:hover, .btn-outline-secondary:hover, .google-btn:hover {
            color: rgb(255,255,255);
            transition: 0.2s 0.1s;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
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

        .google-btn.btn-3 {
            position: relative;
            display: inline-block;
            width: 100%;
            background-color: transparent;
            border: 1px solid rgb(28, 31, 30);
            overflow: hidden;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .google-btn.btn-3 span {
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

        .google-btn.btn-3::before {
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

        .google-btn.btn-3:hover::before {
            top: 0;
        }

        .google-btn.btn-3:hover {
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

        .form-control:focus::placeholder {
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .form-control:focus ~ label {
            top: -18px;
            font-size: 12px;
            color: #555;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            position: absolute;
            left: 12px;
            top: 14px;
            font-size: 14px;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .form-control:not(:placeholder-shown) ~ label {
            top: -18px;
            font-size: 12px;
            color: #555;
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
            <div class="container d-flex justify-content-end align-items-center">
                <a class="navbar-brand" href="#">KAISERMARK POWERTOOLS</a>
                <a href="#" class="nav-link">Search</a>
                <a href="#" class="nav-link">Account</a>
                <a href="#" class="nav-link icon-spacing">
                    <i class="bi bi-bell"></i>
                </a>
            </div>
        </nav>
        <div class="container form-container fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" placeholder=" " required>
                            <label>Email</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="password" class="form-control" placeholder=" " required>
                            <label>Password</label>
                            <span id="toggle-password" class="bi bi-eye position-absolute" style="right: 10px; top: 38px; cursor: pointer;"></span>
                        </div>
                        <button type="submit" class="btn btn-create btn-2 hover-slide-up">
                            <span>LOGIN</span>
                        </button>
                    </form>
                    <center>
                        <div class="text-center login-link">
                            <a href="register.php" class="login-link">Don't have an account? Register</a>
                        </div>
                    </center>
                    <div class="divider">OR</div>
                    <center>
                        <button type="button" class="btn btn-outline-dark google-btn btn-3 hover-slide-up">
                            <span>
                                <a href="<?php echo htmlspecialchars($googleClient->createAuthUrl()); ?>">
                                <i class="bi bi-google"></i>Continue with Google
                                </a>
                            </span>
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var icon = this;

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
