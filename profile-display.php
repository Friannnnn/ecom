<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?: null;
    $email = $_POST['email'] ?: null;
    $firstName = $_POST['firstName'] ?: null;
    $lastName = $_POST['lastName'] ?: null;
    $address = $_POST['address'] ?: null;
    $city = $_POST['city'] ?: null;
    $province = $_POST['province'] ?: null;
    $postalCode = $_POST['postalCode'] ?: null;
    $aboutMe = $_POST['aboutMe'] ?: null;

    // Prepare and bind
    $stmt = $conn->prepare('UPDATE users SET username = ?, email = ?, first_name = ?, last_name = ?, address = ?, city = ?, province = ?, postal_code = ?, about_me = ? WHERE email = ?');
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('ssssssssss', $username, $email, $firstName, $lastName, $address, $city, $province, $postalCode, $aboutMe, $_SESSION['email']);

    if ($stmt->execute()) {
        // Update session email if changed
        if ($email) {
            $_SESSION['email'] = $email;
        }
        header('Location: profile-display.php');
        exit();
    } else {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Inter', sans-serif;
        }

        .navbar {
            padding: 16px 40px;
            height: 90px;
            background-color: #ffffff;
            border-bottom: 1px solid #e4e4e4;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-radius: 10px;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .brand-search-group {
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            margin-right: 20px;
        }

        .input-container {
            position: relative;
            width: 600px;
        }

        .form-control {
            padding-right: 30px;
            padding-left: 20px;
            height: 50px;
            font-size: 16px;
            border-color: #dcdcdc;
            border-radius: 25px;
        }

        .form-control:focus {
            border-color: #dcdcdc;
            box-shadow: none;
        }

        .bi-search {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .accessibility-container {
            display: flex;
            align-items: center;
        }

        .accessibility-container .cart-button {
            background-color: #F5F4F4;
            border: none;
            display: flex;
            align-items: center;
            padding: 8px 15px;
            height: auto;
            min-width: 110px;
            min-height: 35px;
            border-radius: 50px;
            justify-content: center;
            margin-right: 25px;
        }

        .accessibility-container .cart-button .bi-cart-fill {
            font-size: 18px;
        }

        .accessibility-container .cart-button span {
            margin-left: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile-name {
            margin-left: 10px;
            font-size: 14px;
        }

        .profile-photo {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-left: 15px;
        }

        .profile-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .separator {
            margin-left: 8px;
            margin-right: 8px;
            font-size: 14px;
            color: #B8B8B8;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            align-items: center;
            justify-content: space-evenly;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-header h3 {
            margin-bottom: 5px;
            text-align: center;
        }

        .profile-header p {
            font-style: italic;
            color: #777;
            text-align: center;
        }

        .profile-header .profile-stats {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            width: 100%;
            text-align: center;
        }

        .profile-header .profile-stats p {
            margin: 5px 0;
        }

        .profile-header .profile-stats div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-header .profile-stats div span {
            font-size: 24px;
            color: black;
        }

        .profile-header .profile-stats div p {
            color: gray;
        }

        .line-above-stats {
            width: 100%;
            height: 1px;
            background-color: #e4e4e4;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 65%;
        }

        .form-container h4 {
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .btn-update {
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

        .btn-update::before {
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

        .btn-update:hover::before {
            top: 0;
        }

        .btn-update:hover {
            color: white;
        }

        .btn-update span {
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

        .cancel-link {
    display: inline-block;
    margin-top: 10px;
    color: black;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-container">
        <div class="brand-search-group">
            <a class="navbar-brand" href="discover.php">
                <img src="assets/logo_mini.jpg" alt="Logo" style="height: 50px; width: 50px; border-radius: 50%;">
            </a>
            <div class="input-container">
                <input class="form-control rounded-pill" type="search" placeholder='try "Generator"...' aria-label="Search">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="accessibility-container">
            <div class="icon">
                <i class="bi bi-bell"></i>
            </div>
            <button class="cart-button">
                <i class="bi bi-cart-fill"></i>
                <span>3 items</span>
            </button>
            <span class="separator">|</span>

            <a href="profile.php" class="profile-link">
                <div class="profile">
                    <?php 
                        if (isset($_SESSION['name'])) {
                            $nameParts = explode(' ', $_SESSION['name']);
                            $firstName = $nameParts[0];
                            $secondName = isset($nameParts[1]) ? $nameParts[1] : '';

                            echo '<img class="profile-photo" src="' . htmlspecialchars($_SESSION['picture']) . '" alt="Profile Photo">';
                            echo '<span class="profile-name">' . htmlspecialchars($firstName) . ' ' . htmlspecialchars($secondName) . '</span>';
                        } else {
                            echo '<i class="bi bi-person profile-photo" style="font-size: 25px;"></i>';
                            echo '<span class="profile-name">Profile</span>';
                        }
                    ?>
                </div>
            </a>
        </div>
    </div>
</nav>
<div class="container">
    <!-- Profile Header -->
    <div class="profile-header">
        <?php 
            // Generate username from first name (e.g., firstName123)
            $username = isset($firstName) ? strtolower($firstName) . '123' : 'johndoe123';
        ?>
        <img src="<?php echo isset($_SESSION['picture']) ? htmlspecialchars($_SESSION['picture']) : 'https://via.placeholder.com/120'; ?>" alt="Profile Picture">
        <h3><?php echo isset($firstName) && isset($secondName) ? htmlspecialchars($firstName) . ' ' . htmlspecialchars($secondName) : 'John Doe'; ?></h3>
        <p>@<?php echo htmlspecialchars($username); ?></p>
        <p>"I love to code, and I love solving problems!"</p>
        <div class="line-above-stats"></div>
        <div class="profile-stats">
            <div>
                <span>12</span>
                <p>Vouchers</p>
            </div>
            <div>
                <span>2</span>
                <p>Likes</p>
            </div>
            <div>
                <span>24</span>
                <p>Cart</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <h4>Profile Information</h4>
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <p id="fullName"><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'John Doe'; ?></p>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <p id="email"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'johndoe@example.com'; ?></p>
        </div>
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <p id="contact"><?php echo isset($_SESSION['contact']) ? htmlspecialchars($_SESSION['contact']) : '09123456789'; ?></p>
        </div>
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <p id="address"><?php echo isset($_SESSION['address']) ? htmlspecialchars($_SESSION['address']) : '123 Street Name, City, Country'; ?></p>
        </div>
        <div class="form-group">
            <button type="button" class="btn-update" onclick="location.href='profile-edit.php'">
                <span>Edit Profile</span>
            </button>
        </div>
        <center>
            <a href="logout.php" class="cancel-link">
                    Sign Out
                </a>
        </center>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
