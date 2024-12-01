<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started Now</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
    background-color: #f9f9f9;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.form-wrapper {
    max-width: 400px;
}

h1 {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
}

p {
    font-size: 0.9rem;
    color: #666;
}

.btn-outline-primary {
    border: 1px solid #4285F4;
    color: #4285F4;
}

.btn-outline-dark {
    border: 1px solid #333;
    color: #333;
}

.btn-outline-primary:hover {
    background-color: #4285F4;
    color: #fff;
}

.btn-outline-dark:hover {
    background-color: #333;
    color: #fff;
}

.form-floating .form-control {
    padding: 1rem 0.75rem;
}

label {
    font-size: 0.9rem;
}

.form-check-input {
    margin-right: 0.5rem;
}

.btn-primary {
    background-color: #4285F4;
    border-color: #4285F4;
}

.btn-primary:hover {
    background-color: #357ae8;
    border-color: #357ae8;
}

</style>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="form-wrapper bg-white rounded shadow p-4 text-center">
            <h1 class="mb-3">Get Started Now</h1>
            <p class="text-muted mb-4">Enter your credentials to access your account</p>

            <!-- Login Options -->
            <div class="d-grid gap-3 mb-3">
                <button class="btn btn-outline-primary d-flex align-items-center justify-content-center">
                    <i class="bi bi-google me-2"></i> Log in with Google
                </button>
                <button class="btn btn-outline-dark d-flex align-items-center justify-content-center">
                    <i class="bi bi-apple me-2"></i> Log in with Apple
                </button>
            </div>

            <p class="text-muted mb-3">or</p>

            <!-- Form -->
            <form>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Name">
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email address">
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="text-decoration-none small text-primary">Forgot password?</a>
                </div>

                <div class="form-check text-start mb-3">
                    <input class="form-check-input" type="checkbox" id="terms">
                    <label class="form-check-label small" for="terms">
                        I agree to the <a href="#" class="text-primary">Terms & Privacy</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </form>

            <p class="mt-3 text-muted small">
                Have an account? <a href="#" class="text-primary">Sign in</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
