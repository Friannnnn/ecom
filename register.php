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
    <title>Kaisermark Powertools - Register</title>
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
        .modal-dialog {
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
    margin-top: 200px;
}

.modal-content {
    margin-top: 5%;
    width: 100%;
    max-width: 500px;
    min-height: auto;
}

.modal-body {
    text-align: center;
    padding-bottom: 20px;
}

.modal-text {
    color: black; /* Text color */
    font-size: 18px;
    margin-bottom: 20px;
}

.landscape-btn {
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 600;
    color: black;
    background-color: white;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    transition: background-color 0.2s ease, color 0.2s ease;
    width: 80%;
    display: inline-block;
    margin-bottom: 10px; /* Space between buttons */
}

.landscape-btn:hover {
    background-color: black;
    color: white;
}

.maybe-later-text {
    font-size: 14px;
    font-weight: 500;
    color: black;
    text-decoration: none;
    cursor: pointer;
    display: inline-block;
    margin-top: 10px; /* Space below "Set Up Now" button */
}

.maybe-later-text:hover {
    text-decoration: underline;
}

.modal-body div {
    margin-bottom: 15px; /* Ensure proper spacing between the "Set Up Now" button and the "Maybe Later" link */
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
                    <form id="registerForm">
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="email" placeholder=" " required>
                            <label>Email</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="password" class="form-control" placeholder=" " required minlength="8">
                            <label>Password</label>
                            <i class="bi bi-eye eye-icon" id="toggle-password" onclick="togglePassword()"></i>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="confirm-password" class="form-control" placeholder=" " required minlength="8">
                            <label>Confirm Password</label>
                        </div>
                        <div id="error-message" class="error-message">Passwords do not match.</div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-create">
                                <span>Create</span>
                            </button>
                        </div>
                        <div class="divider">or</div>
                    </form>
                    <button class="google-btn">
    <a href="<?php echo htmlspecialchars($googleClient->createAuthUrl()); ?>" style="text-decoration:none;">
        <span><i class="bi bi-google"></i>Sign in with Google</span>
    </a>
</button>
                    <p class="text-center mt-3">Already have an account? <a href="login.php" class="login-link">Log in</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="setupModal" tabindex="-1" aria-labelledby="setupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="modal-text">Would you like to set up your account?</p>
                <a href="profile.php" class="landscape-btn" id="setupNowLink">Set Up Now</a> <br>
                <a href="discover.php" class="maybe-later-text" id="maybeLaterLink">Maybe Later</a>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const modal = new bootstrap.Modal(document.getElementById('setupModal'), {
            keyboard: false
        });

        function togglePassword() {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirm-password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            confirmPasswordField.type = type;
        }

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const errorMessage = document.getElementById('error-message');
            if (password !== confirmPassword) {
                errorMessage.style.display = 'block';
                return;
            }
            errorMessage.style.display = 'none';
            modal.show();
        });
    </script>
</body>
</html>
