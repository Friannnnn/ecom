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
    justify-content: space-between; /* Push .button-detail to the bottom */
    align-items: center;
    min-height: 140px; /* Adjust height if needed */
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
    margin-bottom: 10px; /* Add space between header and description */
    min-height: 1.5em; /* Enforces consistent height */
    display: flex;
    align-items: center; /* Vertically aligns text */
    text-align: center;
}

.size-options .button-desc {
    font-size: 1rem;
    color: #666;
    margin-bottom: 10px; /* Add consistent spacing */
    min-height: 1.5em; /* Enforces consistent height */
    display: flex;
    align-items: center; /* Centers text vertically */
    text-align: center; /* Ensures text alignment */
}

.size-options .button-detail {
    font-size: 1rem;
    font-weight: bold;
    color: #ff5722;
    margin-top: 10px; /* Add spacing from other elements if needed */
    min-height: 1.5em; /* Enforces consistent height */
    display: flex;
    align-items: center; /* Centers text vertically */
    text-align: center; /* Ensures text alignment */
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
            border-radius: 50px; /* Increased for more rounded sides */
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }

        .buy-now {
            background-color: black;
            color: white;
            border: 2px solid black; /* Added border for consistency */
        }

        .buy-now:hover {
            background-color: white;
            color: black;
        }

       

        .add-to-cart {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: black;
            border: 2px solid gray;
            border-radius: 50px;
            padding: 18px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        .add-to-cart i {
            margin-right: 8px; /* Space between icon and text */
        }
        
        .add-to-cart:hover {
            background-color: black;
            color: white;
            border-color: gray;
        }

        .product-page-container {
    margin-top: 30px; /* Adjust the space above the content */
    padding: 0 15px; /* Optional: Add some horizontal padding */
}
.section_2 {
    display: flex;
    flex-wrap: wrap; /* Allow child elements to wrap onto new lines if necessary */
    justify-content: space-between;
    padding: 30px;
    max-width: 1200px;
    margin: 0 auto;
    gap: 30px;
}

.box {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    flex: 1; /* Takes equal share of the space */
    max-width: 50%;
    box-sizing: border-box; /* Ensure padding and margins are included in width calculation */
}

.ratings {
    max-width: calc(45% - 10%); /* Width adjusted to 45% and 10% margin */
    margin-left: 10%; /* Adds margin to the left of ratings */
}


        /* Product Info Styling */
        .product-info h2,
        .rating-reviews h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .tabs {
            display: flex;
            gap: 30px;
            margin-bottom: 20px;
            position: relative;
        }

        .tabs a {
            text-decoration: none;
            color: #000;
            padding: 10px 0;
            position: relative;
            cursor: pointer;
            font-weight: normal;
            transition: color 0.3s ease;
        }

        .tabs a.active {
            font-weight: bold;
            color: #ff5722;
        }

        .tabs a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 2px;
            background-color: black;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .tabs a.active::after {
            transform: scaleX(1);
        }

        .tabs a:hover {
            color: #ff5722;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .info-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
        }
        .info-box i {
            font-size: 1.5rem;
            color: #ff5722;
        }
        .info-box p {
            margin: 0;
        }
        .note {
            font-size: 0.9rem;
            color: #555;
            margin-top: 20px;
            line-height: 1.5;
        }

        /* Ratings and Reviews Styling */
        .rating-number {
            font-size: 3rem;
            font-weight: bold;
        }
        .rating-small {
            font-size: 1.5rem;
            color: #555;
        }
        .rating-summary {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        .rating-summary p {
            margin: 0;
        }
        .stars {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-top: 10px;
        }
        .stars .star-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .star-row .bar {
            height: 6px;
            background-color: #000;
            border-radius: 3px;
        }
        .star-row .bar-5 { width: 90%; }
        .star-row .bar-4 { width: 50%; }
        .star-row .bar-3 { width: 5%; }
        .star-row .bar-2,
        .star-row .bar-1 { width: 2%; }
        .review {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .review h4 {
            margin: 0;
            font-size: 1rem;
        }
        .review p {
            margin-top: 5px;
            color: #555;
            font-size: 0.9rem;
        }
        .review .date {
            font-size: 0.8rem;
            color: #777;
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

<div class="product-page-container">
    <div class="product-container">
        <div class="image-gallery">
            <img src="assets/product_disp_1.webp" alt="Product Image">
            <div class="thumbnail-images">
                <img src="assets/toyohama_tn.webp" alt="Thumbnail" class="active">
                <img src="https://via.placeholder.com/100x100" alt="Thumbnail">
                <img src="https://via.placeholder.com/100x100" alt="Thumbnail">
            </div>
        </div>

        <div class="product-details">
            <div class="product-subtitle">New Arrival!</div>
            <div class="product-title">Toyohama Gasoline Silent Inverter Generator 3500i</div>
            <div class="price">
                <span class="original-price">₱69,000.00</span>
                <span class="discounted-price">₱17,000.00 </span>
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
                <button class="add-to-cart">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                </button>
            </div>
        </div>
    </div>
    
    <div class="section_2">
    <!-- Product Info -->
    <div class="box product-info">
        <h2>Product Info</h2>
        <div class="tabs">
            <a href="#overview" class="active">Overview</a>
            <a href="#shipment-details">Shipment Details</a>
        </div>
        <div class="info-grid">
            <div class="info-box">
                <i class="fa-solid fa-tag"></i>
                <div>
                    <p><strong>Discount</strong></p>
                    <p>1000000</p>
                </div>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-truck"></i>
                <div>
                    <p><strong>Delivery Time</strong></p>
                    <p>6 - 12 Working Days</p>
                </div>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-box"></i>
                <div>
                    <p><strong>Package</strong></p>
                    <p>Garbage Bag</p>
                </div>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-calendar"></i>
                <div>
                    <p><strong>Estimation Arrive</strong></p>
                    <p>10 - 12 October 2023</p>
                </div>
            </div>
        </div>
        <div class="note">
            <p><strong>Note*</strong></p>
            <p>During checkout, we'll provide you with the estimated delivery date based on your order's delivery address. Orders are processed and delivered Monday–Friday (excluding public holidays).</p>
        </div>
    </div>

        <div class="box rating-reviews">
            <h2>Rating & Reviews</h2>
            <div class="rating-summary">
                <span class="rating-number">4.9</span>
                <span class="rating-small">/5</span>
                <p>(41 New Reviews)</p>
            </div>
            <div class="stars">
                <div class="star-row">
                    <span>★ 5</span>
                    <div class="bar bar-5"></div>
                </div>
                <div class="star-row">
                    <span>★ 4</span>
                    <div class="bar bar-4"></div>
                </div>
                <div class="star-row">
                    <span>★ 3</span>
                    <div class="bar bar-3"></div>
                </div>
                <div class="star-row">
                    <span>★ 2</span>
                    <div class="bar bar-2"></div>
                </div>
                <div class="star-row">
                    <span>★ 1</span>
                    <div class="bar bar-1"></div>
                </div>
            </div>
            <div class="review">
                <h4>Alexander Stewart <span class="date">★ 5 • 02 Oct</span></h4>
                <p>I recently purchased the Toyohama Gasoline Silent Inverter Generator 3500i for my camping trips, and I couldn’t be happier! This generator is incredibly quiet, which was my top priority. </p>
            </div>
        </div>
    </div>
</div>

<div class="section_3">


    <div class="explore-container" style="text-align: center; margin: 40px 0;">
        <h2 id="explore-header">Explore More Products</h2>
</div>

<div class="product-list-main">
  

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
</div><br>

    <div class="view-more-container">
<a href="discover.php#shopnow-build-later-container" class="view-more-button">View More</a>
</div>
<br>





<footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <h5>Kaisermark</h5>
          <p>Kaisermark powe, founded in IDK, specializes in premium power tools for professionals and enthusiasts nationwide.</p>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    $('.thumbnail-images img').click(function () {
        $('.thumbnail-images img').removeClass('active');
        $(this).addClass('active');
        $('.image-gallery img').attr('src', $(this).attr('src'));
    });

    $('.size-options button').click(function () {
        $('.size-options button').removeClass('active');
        $(this).addClass('active');
    });



    $(document).ready(function() {
        $('.tabs a').click(function(e) {
            e.preventDefault();
            $('.tabs a').removeClass('active');
            $(this).addClass('active');
            
            // Smooth scroll to the section
            const target = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 500);
        });
    });
</script>
</body>
</html>
