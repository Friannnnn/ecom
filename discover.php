<?php 
session_start();

$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

$userProfileImage = isset($_SESSION['picture']) ? $_SESSION['user_profile_image'] : '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kaisermark Powertools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
  display: block; /* Make the anchor tag occupy the full width of the parent div */
  text-decoration: none; /* Remove the underline from the link */
  color: inherit; /* Ensure the text color remains the same */
}

  .separator {
    margin-left: 8px;
    margin-right: 8px;
    font-size: 14px;
    color: #B8B8B8;
  }

  .arrival-discount-container {
    display: flex;
    justify-content: space-between;
    margin: 30px auto;
    width: 95%;
  }

  .product-card {
    flex: 0 0 58%;
    height: auto;
    border: 1px solid #e4e4e4;
    border-radius: 20px;
    overflow: hidden;
    background-color: white;
    text-align: center;
    transition: box-shadow 0.2s ease;
    position: relative;
  }

  .product-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .view-button {
    position: absolute;
    bottom: 20px;
    left: 30px;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 600;
    color: white;
    background-color: #131312;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    transition: background-color 0.2s ease, color 0.2s ease;
  }

  .view-button:hover {
    background-color: white;
    color: #131312;
  }

  .discount-card {
    flex: 0 0 40%;
    height: auto;
    border: 1px solid #e4e4e4;
    border-radius: 20px;
    overflow: hidden;
    background-color: #f9f9f9;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
  }

  .discount-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .discount-card .view-button {
    position: absolute;
    left: 30px;
    bottom: 20px;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 600;
    color: black;
    background-color: white;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    transition: background-color 0.2s ease, color 0.2s ease;
  }

  .discount-card .view-button:hover {
    background-color: #131312;
    color: white;
  }

  .todays-best-deals-container {
    background-color: #f4f5f5;
    padding: 10px 15px;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 30px;
    margin-right: 30px;
    border-radius: 15px;
  }

  .todays-best-deals-header {
    font-size: 20px;
    font-weight: 600;
    margin: 5px 30px 15px 5px;
  }

  .product-box {
  display: flex;
  gap: 15px;
  justify-content: center; 
  flex-wrap: wrap; 
  }
    .product-card-main {
    font-family: "Inter",  sans-serif;
    width: 250px;
    border: 1px solid #e4e4e4;
    border-radius: 20px;
    overflow: hidden;
    background-color: white;
    text-align: center;
    transition: box-shadow 0.2s ease;
    position: relative;
    padding: 15px;
    text-align: left;
    display: flex;
    flex-direction: column;
  }

  #main-product {
    width: 220px;
    width: 220px;
    position: relative;
    top: 10px;
    border-radius: 10px;
  }

  #shopnow-header {
    font-family: 'Poppins', sans-serif; 
    font-size: 45px; 
    font-weight:500;
    letter-spacing: 2px;
  }


  .product-info {
    margin-top: 10px;
  }

  .product-name {
    margin-top: 8px;
    font-size: 16px;
    font-weight: 600;
    color: #000;
    white-space: nowrap;
    overflow: hidden; 
    text-overflow: ellipsis;
    width: 100%;
  }

  .product-rating {
    display: flex;
    align-items: center;
    margin-top: 5px;
  }

  .star-icon {
    color: #f4c430;
    font-size: 14px;
  }

  .rating-value {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-left: 5px;
  }

  .dot {
    font-size: 14px;
    color: #aaa;
    margin: 0 5px;
  }

  .items-sold {
    font-size: 14px;
    color: #aaa;
  }

  .old-price {
    margin-top: 10px;
    font-size: 14px;
    color: #aaa;
    text-decoration: line-through;
  }

  .new-price {
    font-size: 16px;
    font-weight: 600;
    color: #000;
  }


.product-list-main {
  padding: 20px 30px;
}

.custom-filter-container {
  border: 1px solid #ddd;
  border-radius: 100px;
  background-color: white;
  max-width: 900px;
  margin: 0 auto;
  padding: 10px 0;
}

.custom-filter-container {
  border: 1px solid #ddd;
  border-radius: 100px;
  background-color: white;
  max-width: 750px;
  margin: 0 auto;
  padding: 10px 0;
}

.custom-filter-container .d-flex {
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

.custom-filter-container .btn-light {
  font-size: 14px;
  background-color: #f5f5f5;
  position: relative; /* Ensure the chevron is correctly placed */
}

.custom-filter-container .dropdown-toggle::after {
  content: ''; /* Remove the default chevron */
  display: none; /* Hide the default Bootstrap chevron */
}

.custom-filter-container .btn i.bi-chevron-down {
  margin-left: 10px; /* Space out the custom chevron */
}

.custom-filter-container .dropdown-menu {
  min-width: auto;
  padding: 0;
  display: none; /* Start with the dropdown hidden */
  opacity: 0; /* Make it invisible initially */
  transition: opacity 0.3s ease-in-out; /* Smooth opacity transition */
}

.custom-filter-container .dropdown-menu.show {
  display: block; /* Display the dropdown when it has the 'show' class */
  opacity: 1; /* Make it fully visible */
}

.custom-filter-container .dropdown-item {
  padding: 10px 15px;
  color: #333;
}

.custom-filter-container .icon-img {
  height: 20px;
  margin-right: 10px;
}

.custom-filter-container .gray {
  color: #7f7f7f;
}

.custom-filter-container .divider {
  border-left: 1px solid #ddd;
  height: 40px;
}

.custom-filter-container .icon-img {
  height: 20px;
  margin-right: 10px;
}

.custom-filter-container .gray {
  color: #7f7f7f;
}

/* Optional: custom chevron styles for dropdown items */
.custom-filter-container .dropdown-toggle i.bi-chevron-down {
  display: inline-block;
  margin-left: 10px;
}

.custom-filter-container .divider {
  border-left: 1px solid #ddd;
  height: 40px;
}
.gray {
  color: #7f7f7f;

}

.view-more-container {
  text-align: center;
  margin-top: 20px; 
}

.view-more-button {
  padding:12px 40px;
  font-size: 14px;
  font-weight: 600;
  color: white;
  background-color: #131312;
  border: none;
  border-radius: 50px;
  text-decoration: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.view-more-button:hover {
  background-color: white;
  color: #131312;
  border: 1px solid #ddd;
}

.brandcard-container {
  display: flex;
  gap: 20px;
  margin: 20px auto;
  justify-content: center;
  flex-wrap: wrap;
}

.brand-card {
  width: 320px;
  border: 1px solid #eaeaea;
  border-radius: 10px;
  padding: 15px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  background: #fff;
  position: relative;
}

.brand-header {

  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 15px;
}

.brand-logo.placeholder {
  width: 60px;
  height: 60px;
  background-color: #eaeaea;
  border-radius: 5px; 
}

.brand-info {
  flex-grow: 1;
  margin-left: 10px;
}

.brand-info h3 {
  font-size: 16px;
  margin: 0;
  display: flex;
  align-items: center;
}

.verified-badge {
  margin-left: 8px;
  color: #1da1f2;
  font-size: 18px;
}

.brand-info p {
  margin: 5px 0 0;
  font-size: 12px;
  color: #666;
}

.brand-name {
  font-family: "Inter";
  font-weight: bold;
}

.rating-star {
  color: #f5c518; 
  margin-right: 4px;
}


.visit-btn {
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 600;
  color: black;
  background-color: white;
  border: none;
  border-radius: 50px;
  text-decoration: none;
  transition: background-color 0.2s ease, color 0.2s ease;
  margin-left: auto; 
  height: fit-content;
}

.visit-btn:hover {
  background-color: black;
  color: white;
}

.brand-products {
  
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 10px;
}

.product-placeholder {
  width: 100%;
  aspect-ratio: 1;
  background-color: #eaeaea;
  border-radius: 10px;
}


.brand-landscape {
  margin: 20px 40px;
}

.landscape-container {
  width: 100%;
  padding: 20px 0;
}

.landscape-link {
  display: block;
  text-decoration: none;
}

.landscape-placeholder {
  width: 100%;
  height: 400px; 
  position: relative;
}

.landscape-image {
  width: 100%;
  height: 100%;
  object-fit: cover; 
  border-radius: 20px;
}

/* Button styling */
.landscape-btn {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 600;
  color: black;
  background-color: white;
  border: none;
  border-radius: 50px;
  text-decoration: none;
  transition: background-color 0.2s ease, color 0.2s ease;
}

.landscape-btn:hover {
  background-color: black;
  color: white;
}

.footer {
      background-color: #121212;
      color: #ffffff;
      padding: 40px 20px;
    }
    .footer h5 {
      color: #ffffff;
      margin-bottom: 20px;
    }
    .footer p {
      font-size: 14px;
      margin-bottom: 10px;
    }
    .footer .subscribe-box input {
      border: none;
      border-radius: 0;
      padding: 10px;
      width: 100%;
      max-width: 300px;
    }
    .footer .subscribe-box button {
      border: none;
      background-color: #ffffff;
      color: #000;
      padding: 10px 20px;
      margin-top: 10px;
      border-radius: 5px;
    }
    .footer .links ul {
      list-style: none;
      padding: 0;
    }
    .footer .links ul li {
      margin-bottom: 10px;
    }
    .footer .links ul li a {
      text-decoration: none;
      color: #ffffff;
    }
    .footer .links ul li a:hover {
      text-decoration: underline;
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
          <?php if ($isLoggedIn && !empty($userProfileImage)): ?>
            <!-- If the user is logged in and has a profile image, show the profile photo -->
            <img class="profile-photo" src="<?php echo $userProfileImage; ?>" alt="Profile Photo">
          <?php else: ?>
            <!-- If the user is not logged in or doesn't have a profile image, show the default icon -->
            <i class="bi bi-person profile-photo" style="font-size: 25px;"></i>
          <?php endif; ?>
          <span class="profile-name"><?php echo $isLoggedIn ? $_SESSION['user_name'] : 'Profile'; ?></span>
        </div>

        </a>
      </div>
    </div>
  </nav>

  <div class="arrival-discount-container">
    <div class="product-card">
      <img src="assets/arrival_prod.jpg" alt="Product Image">
      <a href="#" class="view-button">View Product</a>
    </div>
    <div class="discount-card">
      <img src="assets/disc_card.jpg" alt="Discount Image">
      <a href="#" class="view-button">Event Details</a>
    </div>
  </div>

  <div class="todays-best-deals-container"> 
  <div class="todays-best-deals-header">Today's Best Deals</div>

    <div class="product-box">
      <div class="product-card-main">
        <img id="main-product" src="assets/prod_1.jpg" alt="Product">
        <div class="product-info">
          <div class="product-name">Pang tustos lang po</div>
          <div class="product-rating">
            <span class="star-icon">★</span>
            <span class="rating-value">4.9</span>
            <span class="dot">•</span>
            <span class="items-sold">652 Items Sold</span>
          </div>
          <div class="old-price">₱ 69,696</div>
          <div class="new-price">₱ I Miss You</div>
        </div>
      </div>

      <div class="product-card-main">
        <img id="main-product" src="assets/prod_2.jpg" alt="Product">
        <div class="product-info">
          <div class="product-name">2nd Hand but Bnew</div>
          <div class="product-rating">
            <span class="star-icon">★</span>
            <span class="rating-value">4.8</span>
            <span class="dot">•</span>
            <span class="items-sold">500 Items Sold</span>
          </div>
          <div class="old-price">₱ 80,000</div>
          <div class="new-price">₱ 75,000</div>
        </div>
      </div>

      <div class="product-card-main">
        <img id="main-product" src="assets/prod_3.jpg" alt="Product">
        <div class="product-info">
          <div class="product-name">Gumagana pero joke lng</div>
          <div class="product-rating">
            <span class="star-icon">★</span>
            <span class="rating-value">4.7</span>
            <span class="dot">•</span>
            <span class="items-sold">400 Items Sold</span>
          </div>
          <div class="old-price">₱ 70,000</div>
          <div class="new-price">₱ 65,000</div>
        </div>
      </div>

      <div class="product-card-main">
        <img id="main-product" src="assets/prod_4.jpg" alt="Product">
        <div class="product-info">
          <div class="product-name">Grinder free rcb manibela</div>
          <div class="product-rating">
            <span class="star-icon">★</span>
            <span class="rating-value">4.6</span>
            <span class="dot">•</span>
            <span class="items-sold">350 Items Sold</span>
          </div>
          <div class="old-price">₱ 60,000</div>
          <div class="new-price">₱ 55,000</div>
        </div>
      </div>
  </div>
</div>

<div class="shopnow-build-later-container" style="text-align: center; margin: 40px 0;">
  <h2 id="shopnow-header">Shop Now, Build Later</h2>
  <p id="shopnow-subtext" style="font-size: 14px; color: #7f7f7f;">We have a wide range of power tools and generators for you! Explore <br>our collection and find the tools you need to get the job done.</p>
</div>

<div class="custom-filter-container">
  <div class="d-flex justify-content-center gap-4 flex-wrap">
    <!-- Nike Filter -->
    <div class="dropdown">
      <button
        class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 dropdown-toggle"
        data-bs-toggle="dropdown" 
        aria-expanded="false"
      >
        <img src="https://via.placeholder.com/20" alt="Nike Logo" class="icon-img">
        Nike
        <i class="bi bi-chevron-down"></i>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Nike Air</a></li>
        <li><a class="dropdown-item" href="#">Nike Zoom</a></li>
        <li><a class="dropdown-item" href="#">Nike Free</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button
        class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 gray dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        Price
        <i class="bi bi-chevron-down"></i>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">$0 - $50</a></li>
        <li><a class="dropdown-item" href="#">$50 - $100</a></li>
        <li><a class="dropdown-item" href="#">$100 - $200</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button
        class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 gray dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
        >
        Category

        <i class="bi bi-chevron-down"></i>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Running</a></li>
        <li><a class="dropdown-item" href="#">Casual</a></li>
        <li><a class="dropdown-item" href="#">Sports</a></li>
      </ul>
    </div>

    <div class="divider"></div>

    <div class="dropdown">
      <button
        class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        More Filter
        <i class="bi bi-sliders ms-2"></i>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Newest</a></li>
        <li><a class="dropdown-item" href="#">Best Sellers</a></li>
        <li><a class="dropdown-item" href="#">Discounted</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="product-list-main">
  <div class="product-box">
    <div class="product-card-main">
      <img id="main-product" src="assets/prod_1.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Pang tustos lang po</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.9</span>
          <span class="dot">•</span>
          <span class="items-sold">652 Items Sold</span>
        </div>
        <div class="old-price">₱ 69,696</div>
        <div class="new-price">₱ I Miss You</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_2.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">2nd Hand but Bnew</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.8</span>
          <span class="dot">•</span>
          <span class="items-sold">500 Items Sold</span>
        </div>
        <div class="old-price">₱ 80,000</div>
        <div class="new-price">₱ 75,000</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_3.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Gumagana pero joke lng</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.7</span>
          <span class="dot">•</span>
          <span class="items-sold">400 Items Sold</span>
        </div>
        <div class="old-price">₱ 70,000</div>
        <div class="new-price">₱ 65,000</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_4.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Grinder free rcb manibela</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.6</span>
          <span class="dot">•</span>
          <span class="items-sold">350 Items Sold</span>
        </div>
        <div class="old-price">₱ 60,000</div>
        <div class="new-price">₱ 55,000</div>
      </div>
    </div>
    <div class="product-card-main">
      <img id="main-product" src="assets/prod_1.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Pang tustos lang po</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.9</span>
          <span class="dot">•</span>
          <span class="items-sold">652 Items Sold</span>
        </div>
        <div class="old-price">₱ 69,696</div>
        <div class="new-price">₱ I Miss You</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_2.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">2nd Hand but Bnew</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.8</span>
          <span class="dot">•</span>
          <span class="items-sold">500 Items Sold</span>
        </div>
        <div class="old-price">₱ 80,000</div>
        <div class="new-price">₱ 75,000</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_3.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Gumagana pero joke lng</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.7</span>
          <span class="dot">•</span>
          <span class="items-sold">400 Items Sold</span>
        </div>
        <div class="old-price">₱ 70,000</div>
        <div class="new-price">₱ 65,000</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_4.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Grinder free rcb manibela</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.6</span>
          <span class="dot">•</span>
          <span class="items-sold">350 Items Sold</span>
        </div>
        <div class="old-price">₱ 60,000</div>
        <div class="new-price">₱ 55,000</div>
      </div>
    </div>
    <div class="product-card-main">
      <img id="main-product" src="assets/prod_1.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Pang tustos lang po</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.9</span>
          <span class="dot">•</span>
          <span class="items-sold">652 Items Sold</span>
        </div>
        <div class="old-price">₱ 69,696</div>
        <div class="new-price">₱ I Miss You</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_2.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">2nd Hand but Bnew</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.8</span>
          <span class="dot">•</span>
          <span class="items-sold">500 Items Sold</span>
        </div>
        <div class="old-price">₱ 80,000</div>
        <div class="new-price">₱ 75,000</div>
      </div>
    </div>

    <div class="product-card-main">
      <img id="main-product" src="assets/prod_3.jpg" alt="Product">
      <div class="product-info">
        <div class="product-name">Gumagana pero joke lng</div>
        <div class="product-rating">
          <span class="star-icon">★</span>
          <span class="rating-value">4.7</span>
          <span class="dot">•</span>
          <span class="items-sold">400 Items Sold</span>
        </div>
        <div class="old-price">₱ 70,000</div>
        <div class="new-price">₱ 65,000</div>
      </div>
    </div>
    
  </div>
</div>
<div class="view-more-container">
<a href="#" class="view-more-button">View More</a>
</div>

<div class="shopnow-build-later-container" style="text-align: center; margin: 40px 0;">
  <h2 id="shopnow-header">The Official Store of The Amazing Brand</h2>
  <p id="shopnow-subtext" style="font-size: 14px; color: #7f7f7f;">Work together with the high quality and famous brand around the world.</p>
</div>

<div class="brandcard-container">
  <div class="brand-card">
    <div class="brand-header">
      <div class="brand-logo">
        <img src="assets/brand_logo(dewalt).jpg" alt="Dewalt">
      </div>
      <div class="brand-info">
        <h3 class="brand-name">DeWalt 
          <span class="verified-badge">
            <i class="bi bi-check-circle-fill"></i>
          </span>
        </h3>
        <p>
          <i class="bi bi-star-fill rating-star"></i>
          <span class="rating">4.9</span> (10219 Reviews)
        </p>
        <p class="followers">7.2M Followers</p>
      </div>
      <button class="visit-btn">Visit</button>
    </div>
    <div class="brand-products">
    <div class="product-placeholder"><img class="product-placeholder" src="assets/dewalt/1.png"></div>
    <div class="product-placeholder"><img class="product-placeholder" src="assets/dewalt/2.png"></div>
    <div class="product-placeholder"><img class="product-placeholder" src="assets/dewalt/3.png"></div>
    <div class="product-placeholder"><img class="product-placeholder" src="assets/dewalt/4.png"></div>

    </div>
  </div>
  <div class="brand-card">
    <div class="brand-header">
      <div class="brand-logo">
        <img src="assets/brand_logo(kawasaki).jpg" alt="Kawasaki">
      </div>
      <div class="brand-info">
        <h3 class="brand-name">Kawasaki 
          <span class="verified-badge">
            <i class="bi bi-check-circle-fill"></i>
          </span>
        </h3>
        <p>
          <i class="bi bi-star-fill rating-star"></i>
          <span class="rating">4.9</span> (10219 Reviews)
        </p>
        <p class="followers">7.2M Followers</p>
      </div>
      <button class="visit-btn">Visit</button>
    </div>
    <div class="brand-products">
      <div class="product-placeholder"></div>
      <div class="product-placeholder"></div>
      <div class="product-placeholder"></div>
      <div class="product-placeholder"></div>
    </div>
  </div>
  <div class="brand-card">
    <div class="brand-header">
      <div class="brand-logo">
        <img src="assets/brand_logo(makita).jpg" alt="Makita">
      </div>
      <div class="brand-info">
        <h3 class="brand-name">Makita
          <span class="verified-badge">
            <i class="bi bi-check-circle-fill"></i>
          </span>
        </h3>
        <p>
          <i class="bi bi-star-fill rating-star"></i>
          <span class="rating">4.9</span> (10219 Reviews)
        </p>
        <p class="followers">7.2M Followers</p>
      </div>
      <button class="visit-btn">Visit</button>
    </div>
    <div class="brand-products">
      <div class="product-placeholder"></div>
      <div class="product-placeholder"></div>
      <div class="product-placeholder"></div>
      <div class="product-placeholder"></div>
    </div>
  </div>
</div>
<br>
<div class="view-more-container">
<a href="#" class="view-more-button">View More</a>
</div>

<div class="brand-landscape">
  <div class="landscape-container">
    <a href="#" class="landscape-link">
      <div class="landscape-placeholder">

        <img src="assets/more_aboutus.jpg" alt="Landscape" class="landscape-image">
        <button class="landscape-btn">More About Us</button>
      </div>
    </a>
  </div>
</div>

<footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <h5>Kaisermark</h5>
          <p>Kaisermark Powertools, founded in IDK, specializes in premium power tools for professionals and enthusiasts nationwide.</p>
        </div>

        <div class="col-md-3">
          <h5>Don’t Wanna Miss Our Offers?</h5>
          <div class="subscribe-box">
            <input type="email" placeholder="Your email@mail.com">
            <button>Subscribe</button>
          </div>
        </div>
        <!-- Links -->
        <div class="col-md-2 links">
          <h5>Products</h5>
          <ul>
            <li><a href="#">to be added</a></li>
            <li><a href="#">to be added</a></li>
          </ul>
        </div>
        <div class="col-md-2 links">
          <h5>Collections</h5>
          <ul>
            <li><a href="#">to be added</a></li>
            <li><a href="#">to be added</a></li>
            <li><a href="#">to be added</a></li>
            <li><a href="#">to be added</a></li>
            <li><a href="#">to be added</a></li>
            <li><a href="#">to be added</a></li>
            
          </ul>
        </div>
        <div class="col-md-2 links">
          <h5>Legal</h5>
          <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
          </ul>
        </div>
        <div class="col-md-2 links">
          <h5>Support</h5>
          <ul>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Give feedback</a></li>
            <li><a href="#">Help center</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > lastScrollTop) {
        navbar.classList.add('hidden-navbar');
      } else {
        navbar.classList.remove('hidden-navbar');
      }
      lastScrollTop = scrollTop;
    });

    
  </script>
</body>
</html>
