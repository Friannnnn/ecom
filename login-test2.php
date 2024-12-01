<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered UI Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f9f9f9;
}

.form-container {
    width: 350px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

p {
    color: #666;
    font-size: 14px;
    margin-bottom: 20px;
}

.login-options button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
}

.google-login {
    background-color: #4285F4;
    color: #fff;
}

.apple-login {
    background-color: #333;
    color: #fff;
}

.or-divider {
    font-size: 14px;
    color: #aaa;
    margin: 15px 0;
}

form label {
    display: block;
    text-align: left;
    font-size: 12px;
    color: #333;
    margin-bottom: 5px;
}

form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.forgot-password {
    font-size: 12px;
    color: #4285F4;
    text-align: right;
    display: block;
    margin-bottom: 15px;
    text-decoration: none;
}

.terms {
    text-align: left;
    font-size: 12px;
    color: #333;
    margin-bottom: 20px;
}

.terms a {
    color: #4285F4;
    text-decoration: none;
}

.login-button {
    width: 100%;
    padding: 10px;
    background-color: #4285F4;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.sign-in-option {
    font-size: 12px;
    color: #666;
}

.sign-in-option a {
    color: #4285F4;
    text-decoration: none;
}

</style>
<body>
    <div class="form-container">
        <h1>Get Started Now</h1>
        <p>Enter your credentials to access your account</p>

        <div class="login-options">
            <button class="google-login">Log in with Google</button>
            <button class="apple-login">Log in with Apple</button>
        </div>

        <p class="or-divider">or</p>

        <form>
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Name">

            <label for="email">Email address</label>
            <input type="email" id="email" placeholder="Email address">

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password" minlength="8">
            <a href="#" class="forgot-password">Forgot password?</a>

            <div class="terms">
                <input type="checkbox" id="terms">
                <label for="terms">I agree to the <a href="#">Terms & Privacy</a></label>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>

        <p class="sign-in-option">
            Have an account? <a href="#">Sign in</a>
        </p>
    </div>
</body>
</html>
