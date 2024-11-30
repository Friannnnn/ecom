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
  font-size: 16px;
  font-weight: 600;
  color: #000;
  margin-top: 8px;
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
          <div class="product-name">Hindi Ko Alam pero forsale</div>
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
    </div>
    <div class="product-card-main"> 
      <img id="main-product" src="./assets/prod_3.png" alt="Product">
    </div>
    <div class="product-card-main"> 
      <img id="main-product" src="./assets/prod_4.png" alt="Product">
    </div>
    
  </div>
</div>

<div class="shopnow-build-later-container" style="text-align: center; margin: 40px 0;">
  <h2 id="shopnow-header">Shop Now, Build Later</h2>
  <p id="shopnow-subtext" style="font-size: 14px; color: #555;">We have a wide range of power tools and generators for you! Explore <br>our collection and find the tools you need to get the job done.</p>
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
