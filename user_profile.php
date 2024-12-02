<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
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
</style>
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
              $firstName = $nameParts[0];  // first name
              $secondName = isset($nameParts[1]) ? $nameParts[1] : '';  // second name or empty if not available

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