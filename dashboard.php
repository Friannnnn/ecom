<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kaisermark Powertools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      margin: 0;
    }
    .navbar {
      background-color: #EDF0EF;
      display: flex;
      justify-content: space-between;
    }
    .navbar-bottom {
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    .navbar .nav-item {
      flex: 1;
    }
    .nav-link {
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-size: 12px;
      text-align: center;
    }
    .nav-link i {
      font-size: 22px;
      margin-bottom: 3px;
    }
    .navbar-nav {
      display: flex;
      justify-content: space-evenly;
      width: 100%;
    }
    .cart-button {
      position: fixed;
      top: calc(100% - 110px);
      left: 50%;
      transform: translateX(-50%);
      width: 70px;
      height: 70px;
      background-color: #fff;
      border: 2px solid #EDF0EF;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 10;
    }
    .cart-button i {
      font-size: 24px;
      color: #000;
    }
    @media (max-width: 576px) {
      .nav-link {
        height: 50px;
        font-size: 10px;
      }
      .cart-button {
        top: calc(100% - 90px);
        width: 60px;
        height: 60px;
        font-size: 20px;
      }
      .nav-link i {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>


  <div class="container mt-5">
    <h1>Welcome! <?= htmlspecialchars($_SESSION['name']); ?></h1>
    <p>Contents.</p>
  </div>

  <a href="#" class="cart-button">
    <i class="bi bi-cart"></i>
  </a>

  <nav class="navbar navbar-bottom navbar-expand-lg">
    <div class="container-fluid">
      <ul class="navbar-nav w-100">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-house"></i>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-card-list"></i>
            Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-question-circle"></i>
            Help Center
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">
            <i class="bi bi-person"></i>
            Profile
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
