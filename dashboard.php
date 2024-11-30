<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/company_logo.jpg">
    <title>Kaisermark Powertools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; 
        }

        html, body {
            height: 100%; 
            width: 100%; 
        }

        body {
            background-color: gray;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex-grow: 1; 
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa; 
            width: 100%; 
            max-width: 1920px; 
            margin: 0 auto; 
            overflow: auto; 
        }

        .navbar {
            background-color: #EDF0EF; 
        }

        .navbar-bottom {
            width: 100%;
            z-index: 1; 
        }

        .navbar .nav-item {
            flex: 1;
        }

        .nav-link {
            color: black;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-size: 12px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s; 
            border-radius: 10px;
        }

        .nav-link i {
            font-size: 22px;
            margin-bottom: 3px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: gray; 
            color: white; 
            border-radius: 10px;
        }

        .navbar-nav {
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
            transition: transform 0.2s; 
        }

        .cart-button i {
            font-size: 24px;
            color: #000;
        }

        .cart-button:hover {
            transform: translateX(-50%) scale(1.1); 
        }

        .loading {
            display: none; 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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

<div class="container">
    <div id="content">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>

<a href="#" class="cart-button">
    <i class="bi bi-cart2"></i>
</a>

<nav class="navbar navbar-bottom navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar nav w-100">
            <li class="nav-item">
                <a class="nav-link" href="home.php" data-target="#content"> 
                    <i class="bi bi-house"></i> Home 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="help.php" data-target="#content"> 
                    <i class="bi bi-question-circle"></i> Help Center 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orders.php" data-target="#content"> 
                    <i class="bi bi-card-list"></i> Orders 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php"> 
                    <i class="bi bi-person"></i> Profile 
                </a>
            </li>
        </ul>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script>
     $(document).ready(function() {
        $('#content').load('home.php', function() {
            $('.loading').hide();
        });

        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            var targetUrl = $(this).attr('href');
            $('.loading').show(); 
            $('#content').load(targetUrl, function() {
                $('.loading').hide(); 
            })
        });
    });
</script>

</body>
</html>
