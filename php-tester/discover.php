<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar with Scroll Effect</title>
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
  justify-content: center; /* Centers the product cards */
  flex-wrap: wrap; /* Allows wrapping of cards on smaller screens */
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
    white-space: nowrap; /* Prevent the text from wrapping */
    overflow: hidden; /* Hide text that overflows */
    text-overflow: ellipsis; /* Show "..." when text overflows */
    width: 100%; /* Ensure it takes up full available width */
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

  /* Styling for Product List Main */
.product-list-main {
  padding: 20px 30px;
}

  .custom-filter-container {
  border: 1px solid #ddd;
  border-radius: 100px;
  background-color: white;
  max-width: 900px;
  margin: 0 auto;
  padding: 10px 0; /* Top and bottom padding for compact height */
}

/* Adjust spacing between text and down arrow icons */
.custom-filter-container .btn i.bi-chevron-down {
  margin-left: 40px;
}

/* Divider line styling */
.custom-filter-container .divider {
  border-left: 1px solid #ddd;
  height: 40px;
}

/* Styling for icon images inside buttons */
.custom-filter-container .icon-img {
  height: 20px;
  margin-right: 10px;
}

.rounded-pill {
  font-size: 14px;
  background-color: #f5f5f5;
}

.gray {
  color: #7f7f7f;

}

.view-more-container {
  text-align: center; /* Center the button */
  margin-top: 20px; /* Add spacing above the button */
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

.brand-card {
  position: relative;
  background-color: #f4f4f4;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
          <img src="./assets/logo_mini.png" alt="Logo" style="height: 50px; width: 50px; border-radius: 50%;">
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
        <div class="profile">
          <img class="profile-photo" src="https://via.placeholder.com/35" alt="Profile Photo">
          <span class="profile-name">John Doe</span>
        </div>
      </div>
    </div>
  </nav>

  <div class="arrival-discount-container">
    <div class="product-card">
      <img src="./assets/arrival_prod.png" alt="Product Image">
      <a href="#" class="view-button">View Product</a>
    </div>
    <div class="discount-card">
      <img src="./assets/disc_card.png" alt="Discount Image">
      <a href="#" class="view-button">Event Details</a>
    </div>
  </div>

  <div class="todays-best-deals-container"> 
  <div class="todays-best-deals-header">Today's Best Deals</div>

    <div class="product-box">
      <div class="product-card-main">
        <img id="main-product" src="./assets/prod_1.png" alt="Product">
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
        <img id="main-product" src="./assets/prod_2.png" alt="Product">
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
        <img id="main-product" src="./assets/prod_3.png" alt="Product">
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
        <img id="main-product" src="./assets/prod_4.png" alt="Product">
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
    <button class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2">
      <img src="https://via.placeholder.com/20" alt="Nike Logo" class="icon-img">
      Nike
      <i class="bi bi-chevron-down"></i>
    </button>
    <button class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 gray">
      Price
      <i class="bi bi-chevron-down"></i>
    </button>
    <button class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 gray">
      Category
      <i class="bi bi-chevron-down"></i>
    </button>
    <button class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2 gray">
      Type
      <i class="bi bi-chevron-down"></i>
    </button>
    <div class="divider"></div>
    <button class="btn btn-light rounded-pill d-flex align-items-center px-4 py-2">
      More Filter
      <i class="bi bi-sliders ms-2"></i>
    </button>
  </div>
</div>

<!-- Product List Main Section -->
<div class="product-list-main">
  <div class="product-box">
    <div class="product-card-main">
      <img id="main-product" src="./assets/prod_1.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_2.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_3.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_4.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_1.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_2.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_3.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_4.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_1.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_2.png" alt="Product">
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
      <img id="main-product" src="./assets/prod_3.png" alt="Product">
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

<div class="brand-card">
  <div class="brand-header">
    <img src="assets/new_balance_logo.png" alt="Brand Logo" class="brand-logo">
    <div class="brand-info">
      <h4 class="brand-name">New Balance <i class="bi bi-check-circle-fill verified-icon"></i></h4>
      <div class="brand-meta">
        <span class="brand-rating"><i class="bi bi-star-fill"></i> 4.9</span>
        <span class="review-count">(10219 Reviews)</span>
      </div>
      <span class="follower-count">7.2M Followers</span>
    </div>
    <button class="visit-button">Visit</button>
  </div>
  <div class="brand-products">
    <img src="assets/shoe1.png" alt="Shoe 1" class="product-img">
    <img src="assets/shoe2.png" alt="Shoe 2" class="product-img">
    <img src="assets/shoe3.png" alt="Shoe 3" class="product-img">
    <img src="assets/shoe4.png" alt="Shoe 4" class="product-img">
  </div>
</div>

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
