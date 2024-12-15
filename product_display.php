<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
        }

        .top-header {
            background-color: #131312;
            padding: 10px 20px;
            color: white;
            font-size: 14px;
        }

        .top-header a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-size: 12px;
        }

        .top-header a:not(:last-child)::after {
            content: " |";
            margin-left: 15px;
        }

        .navbar {
            padding: 16px 40px;
            height: 90px;
            background-color: #ffffff;
            border-bottom: 1px solid #e4e4e4;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: top 0.3s ease-in-out;
            border-radius: 10px;
        }

        .hidden-navbar {
            top: -100px;
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

        .accessibility-container .icon {
            margin-left: 15px;
            font-size: 20px;
            margin-right: 20px;
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

        .product-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            gap: 30px;
        }

        .image-gallery {
            width: 50%;
        }

        .image-gallery img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
        }

        .thumbnail-images {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .thumbnail-images img {
            width: 18%;
            cursor: pointer;
            border-radius: 8px;
            border: 2px solid transparent;
            object-fit: cover;
        }

        .thumbnail-images img.active {
            border-color: orange;
        }

        .product-details {
            width: 50%;
        }

        .product-subtitle {
            font-size: 1.2rem;
            font-weight: 600;
            color: #ff5722;
        }

        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-top: 10px;
        }

        .price {
            margin: 20px 0;
        }

        .original-price {
            text-decoration: line-through;
            color: #aaa;
            font-size: 1rem;
        }

        .discounted-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
        }

        .size-options {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin: 20px 0;
}

.size-options button {
    padding: 20px;
    border: 2px solid #ddd;
    background-color: #fff;
    border-radius: 8px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    text-align: center;
    display: flex;
    flex-direction: column; /* Stack content vertically */
    justify-content: center;
    align-items: center;
    min-height: 100px;
    height: auto;
}

.size-options button.active {
    background-color: orange;
    color: white;
    border-color: orange;
}

.size-options .button-header {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 5px; /* Add space between header and description */
}

.size-options .button-desc {
    font-size: 1rem;
    color: #666;
    margin-bottom: 5px;
}

.size-options .button-detail {
    font-size: 1rem;
    font-weight: bold;
    color: #ff5722;
}
        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 25px;
        }

        .action-buttons button {
            flex: 1;
            padding: 18px;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .buy-now {
            background-color: black;
            color: white;
        }

        .add-to-bag {
            background-color: white;
            color: black;
            border: 2px solid black;
        }

        .product-page-container {
    margin-top: 30px; /* Adjust the space above the content */
    padding: 0 15px; /* Optional: Add some horizontal padding */
}
    </style>
</head>
<body>

<div class="top-header">
    <a href="#">Help Center</a><a href="#">Branch Tracker</a>
</div>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-container">
        <div class="brand-search-group">
            <a class="navbar-brand" href="#">
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
<div class="product-page-container">
    <div class="product-container">
        <div class="image-gallery">
            <img src="https://via.placeholder.com/600x400" alt="Product Image">
            <div class="thumbnail-images">
                <img src="https://via.placeholder.com/100x100" alt="Thumbnail" class="active">
                <img src="https://via.placeholder.com/100x100" alt="Thumbnail">
                <img src="https://via.placeholder.com/100x100" alt="Thumbnail">
            </div>
        </div>

        <div class="product-details">
            <div class="product-subtitle">Category</div>
            <div class="product-title">Amazing Power Tool</div>
            <div class="price">
                <span class="original-price">$199.99</span>
                <span class="discounted-price">$159.99</span>
            </div>
            <div class="size-options">
                <button class="active">
                    <div class="button-header">Ships to Store for Pickup</div>
                    <div class="button-desc">Get it</div>
                    <div class="button-detail">FREE</div>
                </button>
                <button>
                    <div class="button-header">Scheduled Delivery</div>
                    <div class="button-desc">Delivery is not offered at this store</div>
                    <div class="button-detail">Check delivery options</div>
                </button>
                <button>
                    <div class="button-header">Ship It</div>
                    <div class="button-desc">Usually ships next day</div>
                    <div class="button-detail">Check arrival date and cost</div>
                </button>
            </div>

            <div class="action-buttons">
                <button class="buy-now">Buy Now</button>
                <button class="add-to-bag">Add to Bag</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.navbar').addClass('hidden-navbar');
        } else {
            $('.navbar').removeClass('hidden-navbar');
        }
    });

    $('.thumbnail-images img').click(function () {
        $('.thumbnail-images img').removeClass('active');
        $(this).addClass('active');
        $('.image-gallery img').attr('src', $(this).attr('src'));
    });

    $('.size-options button').click(function () {
        $('.size-options button').removeClass('active');
        $(this).addClass('active');
    });
</script>

</body>
</html>
