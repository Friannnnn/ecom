<?php
require_once 'vendor/autoload.php';
include 'config.php';  // Include the config file for the database connection

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
// Handle AJAX request to check if email exists
if (isset($_GET['action']) && $_GET['action'] === 'check_email') {
    $response = ['exists' => false];
    header('Content-Type: application/json');
    $response = ['exists' => false];
    if (isset($_GET['email'])) {
        $email = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);
        if ($email) {
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            $response['exists'] = $stmt->num_rows > 0;
            $stmt->close();
        }
    }
    
    echo json_encode($response);
    exit();
}

$googleClient = new Google_Client();
$googleClient->setClientId('320054654260-fcptfeujln15q5biepe21obl7q2bkvr3.apps.googleusercontent.com');
$googleClient->setClientSecret('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');
$googleClient->setRedirectUri('http://localhost/ecom/callback.php');
$googleClient->addScope('email');
$googleClient->addScope('profile');

if (isset($_SESSION['name'])) {
    header("Location: profile-display.php");
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
    $setupOption = $_POST['setup_option'] ?? ''; // Capture user's choice from modal

    if (!$email) {
        $errorMessage = 'Invalid email address.';
    } elseif (strlen($password) < 8) {
        $errorMessage = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirmPassword) {
        $errorMessage = 'Passwords do not match.';
    } else {
        // Check if email already exists
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param('s', $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $errorMessage = 'Email is already registered.';
        } else {
            $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, address, city, province, postal_code, about_me)
                                   VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            // Insert new user with raw password
            $stmt->bind_param('ss', $email, $password);

            // Execute the query
            if ($stmt->execute()) {
                // Set session variables

                $_SESSION['setup_option'] = $setupOption;

                // Redirect based on setup option
                if ($setupOption === 'now') {
                    header("Location: profile-edit.php");
                    exit();
                } else {
                    header("Location: index.php"); // Change to your desired URL for "Maybe Later"
                    exit();
                }
                $_SESSION['email'] = $email;
                // You can store the setup option if needed
                $_SESSION['setup_option'] = $setupOption;
            }
            // Close the prepared statement
            $stmt->close();
        }
        $checkStmt->close();
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

        /* Modern Modal Styles */
        .modal-content {
            border-radius: 20px;
            background-color: #fefefe;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .modal-header {
            background-color: #4CAF50;
            border-bottom: none;
        }

        .modal-title {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
            font-size: 1rem;
            color: #333;
        }

        .modal-footer {
            background-color: #f1f1f1;
            border-top: none;
            padding: 15px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-close {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: white;
            opacity: 1;
        }

        .btn-close:hover {
            color: #ddd;
        }

        /* Updated Modal Styles */
        .modal-body {
            padding: 30px 20px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Remove underline from "Maybe Later" button */
        .btn-link {
            font-size: 14px;
            text-decoration: none;
            color: #6c757d;
            cursor: pointer;
        }
        
        .btn-link:hover {
            text-decoration: none;
            color: #5a6268;
        }

        /* Registration Complete Message Styles */
        .alert-success {
            font-size: 1.2rem;
            padding: 20px;
            border-radius: 10px;
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
                            <button type="submit" class="btn btn-create" id="createAccountButton">
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

    <!-- Registration Confirmation Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body text-center">
                <p>Would you like to set up your account now or maybe later?</p>
                <button type="button" class="btn btn-primary mt-3" id="setupNow">Set Up Now</button>
                <button type="button" class="btn btn-link mt-2" id="maybeLater">Maybe Later</button>
              </div>
            </div>
          </div>
        </div>
    
    <!-- Registration Complete Message -->
    <?php if ($errorMessage): ?>
        <div id="error-message" class="error-message text-center mb-3">
            <?php echo htmlspecialchars($errorMessage); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="container mt-5">
            <div class="alert alert-success text-center" role="alert">
                Registration Complete!
            </div>
        </div>
    <?php endif; ?>

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
            document.addEventListener('DOMContentLoaded', () => {
                const registerForm = document.getElementById('registerForm');
                const registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'));
                const setupNowButton = document.getElementById('setupNow');
                const maybeLaterButton = document.getElementById('maybeLater');

                // Prevent form from submitting and show modal instead
                registerForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    registrationModal.show();
                });

                // If user chooses to set up now, submit the form with setup_option = 'now'
                setupNowButton.addEventListener('click', function() {
                    const setupInput = document.createElement('input');
                    setupInput.type = 'hidden';
                    setupInput.name = 'setup_option';
                    setupInput.value = 'now';
                    registerForm.appendChild(setupInput);
                    registrationModal.hide();
                    registerForm.submit();
                });

                // If user chooses maybe later, submit the form with setup_option = 'later'
                maybeLaterButton.addEventListener('click', function() {
                    const setupInput = document.createElement('input');
                    setupInput.type = 'hidden';
                    setupInput.name = 'setup_option';
                    setupInput.value = 'later';
                    registerForm.appendChild(setupInput);
                    registrationModal.hide();
                    registerForm.submit();
                });
            });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            document.addEventListener('DOMContentLoaded', () => {
                const registerForm = document.getElementById('registerForm');
                const registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'));
                const setupNowButton = document.getElementById('setupNow');
        
                // Prevent form from submitting and show modal instead
                registerForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    registrationModal.show();
                });
        
                // If user chooses to set up now, submit the form
                setupNowButton.addEventListener('click', function() {
                    registrationModal.hide();
                    registerForm.submit();
                });
        
                // "Maybe Later" button automatically dismisses the modal and redirects
                const maybeLaterButtons = document.querySelectorAll('.modal-footer .btn-secondary');
                maybeLaterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        window.location.href = 'index.php'; // Change to your desired URL
                    });
                });
            });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
