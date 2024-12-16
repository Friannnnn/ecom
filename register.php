<?php
require_once 'vendor/autoload.php';
include 'config.php';  // Include the config file for the database connection

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$googleClient = new Google_Client();
$googleClient->setClientId('320054654260-fcptfeujln15q5biepe21obl7q2bkvr3.apps.googleusercontent.com');
$googleClient->setClientSecret('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');
$googleClient->setRedirectUri('http://localhost/ecom/callback.php');
$googleClient->addScope('email');
$googleClient->addScope('profile');

if (isset($_SESSION['name'])) {
    header("location: profile-display.php");
    exit();
}

// Initialize variables for form validation
$errorMessage = '';
$success = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (!$email) {
        $errorMessage = 'Invalid email address.';
    } elseif (strlen($password) < 8) {
        $errorMessage = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirmPassword) {
        $errorMessage = 'Passwords do not match.';
    } else {
        // Insert the user data into the database (without hashing the password)
        $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, address, city, province, postal_code, about_me)
                               VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

        // Bind the parameters
        $stmt->bind_param('ss', $email, $password);

        // Execute the query
        if ($stmt->execute()) {
            $success = true;
        
            // Set session variable to trigger the redirect
            $_SESSION['email'] = $email;
            header("Location: profile-edit.php"); // Redirect to profile-edit page
            exit();
        }
        // Close the prepared statement
        $stmt->close();
    }
}

$conn->close();  // Close the database connection
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
                    <!-- Registration form -->
                    <form id="registerForm" method="POST">
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder=" " required>
                            <label>Email</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder=" " required minlength="8">
                            <label>Password</label>
                            <i class="bi bi-eye eye-icon" id="toggle-password" onclick="togglePassword()"></i>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="confirm-password" name="confirm_password" class="form-control" placeholder=" " required minlength="8">
                            <label>Confirm Password</label>
                        </div>
                        <?php if ($errorMessage): ?>
                            <div id="error-message" class="error-message"><?php echo $errorMessage; ?></div>
                        <?php endif; ?>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-create">
                                <span>Create</span>
                            </button>
                        </div>
                        <div class="divider">or</div>
                    </form>
                    <div class="d-flex justify-content-center">
                        <div class="google-btn">
                            <a href="<?php echo $googleClient->createAuthUrl(); ?>">
                                <span><i class="bi bi-google "></i> Sign Up With Google</span>
                            </a>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="login.php" class="login-link">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var confirmPasswordField = document.getElementById("confirm-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
