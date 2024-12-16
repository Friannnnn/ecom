<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Sample data for profile details, ideally fetched from a database
$firstName = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : 'John';
$lastName = isset($_SESSION['lastName']) ? $_SESSION['lastName'] : 'Doe';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'johndoe@example.com';
$profilePicture = isset($_SESSION['picture']) ? $_SESSION['picture'] : 'https://via.placeholder.com/120';

// Sample shipping address, ideally fetched from a database
$shippingAddress = [
    'address' => isset($_SESSION['address']) ? $_SESSION['address'] : '123 Main St, Apt 4',
    'city' => isset($_SESSION['city']) ? $_SESSION['city'] : 'Manila',
    'province' => isset($_SESSION['province']) ? $_SESSION['province'] : 'Metro Manila',
    'postalCode' => isset($_SESSION['postalCode']) ? $_SESSION['postalCode'] : '1000'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #333;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #007bff !important;
        }
        .container {
            max-width: 1200px;
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .profile-header {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
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
        }
        .profile-header p {
            font-style: italic;
            color: #777;
        }
        .profile-header .profile-stats {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            width: 100%;
            text-align: center;
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
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin-left: 40px;
        }
        .btn-edit {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Kaisermark Power Tools</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="profile-display.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile-edit.php">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile and Address Display -->
    <div class="container">
        <!-- Profile Header -->
        <div class="profile-header">
            <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Picture">
            <h3><?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></h3>
            <p>@<?php echo strtolower($firstName) . '123'; ?></p>
            <p>"I love to code, and I love solving problems!"</p>
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

        <!-- Shipping Address Section -->
        <div class="form-container">
            <h4>Shipping Address</h4>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($shippingAddress['address']); ?></p>
            <p><strong>City:</strong> <?php echo htmlspecialchars($shippingAddress['city']); ?></p>
            <p><strong>Province:</strong> <?php echo htmlspecialchars($shippingAddress['province']); ?></p>
            <p><strong>Postal Code:</strong> <?php echo htmlspecialchars($shippingAddress['postalCode']); ?></p>
            <button class="btn-edit" onclick="window.location.href='profile-edit.php'">Edit Profile</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
