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

    $stmt = $pdo->prepare('UPDATE users SET username = ?, email = ?, first_name = ?, last_name = ?, address = ?, city = ?, province = ?, postal_code = ?, about_me = ? WHERE email = ?');
    $stmt->execute([$username, $email, $firstName, $lastName, $address, $city, $province, $postalCode, $aboutMe, $_SESSION['email']]);

    // Update session email if changed
    if ($email) {
        $_SESSION['email'] = $email;
    }

    header('Location: profile-display.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"><!-- Inter Font -->
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
    margin-left: 15px; /* Space between the bell icon and other elements */
    font-size: 20px; /* Increase the icon size to match the cart and profile photo */
    margin-right: 20px; /* Space between the bell and cart button */
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

i

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
        }
        .profile-header {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            height: 450px;
            align-items: center;
            justify-content: space-evenly;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            margin-top: 20px;
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
        .profile-header .profile-stats hr {
            width: 100%;
            border: 1px solid #ddd;
            margin: 10px 0;
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
        .profile-header .line-above-stats {
            width: 100%;
            border-top: 2px solid #ddd;
            margin-bottom: 10px;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            margin-left: 40px;
        }
        .form-container h4 {
            margin-bottom: 30px;
        }
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }
        .form-group label {
    position: absolute;
    left: 27px; /* Move all labels 5px to the left */
    top: 14px;
    font-size: 14px;
    pointer-events: none;
    transition: all 0.2s ease;
}

.form-group#address label,
.form-group#aboutMe label {
    left: 27px; /* Ensure address and about me labels are aligned */
}
        .form-control {
            height: 45px;
            font-size: 14px;
            border-radius: 0;
            border: 1px solid #ccc;
            box-shadow: none;
            padding-left: 10px;
            padding-right: 10px;
        }
        .form-control:focus {
            outline: none;
            box-shadow: none;
            border-color: #ccc;
        }
        .form-control:focus::placeholder {
            opacity: 0;
            transition: opacity 0.2s ease;
        }
        .form-control:not(:placeholder-shown) ~ label,
        .form-control:focus ~ label {
            top: -18px;
            font-size: 12px;
            color: #555;
        }
        .form-group input {
            padding-left: 10px;
            padding-right: 10px;
        }

        
        .form-group input:focus {
          padding-left: 10px;
          padding-right: 10px;
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

/* Style for the Cancel button */
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


        .row-cols-md-2 .form-group {
            display: flex;
            gap: 20px;
        }
        .row-cols-md-3 .form-group {
            display: flex;
            gap: 20px;
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

            <a href="profile-edit.php" class="profile-link">
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
        <div class="form-container">
    <h4>Edit Profile</h4>
    <form action="profile-edit.php" method="POST">
        <div class="row row-cols-md-2">
            <div class="form-group">
                <!-- Pre-populate Username input -->
                <input type="text" class="form-control" id="username" name="username" placeholder=" " value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                <label for="username">Username</label>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder=" " value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row row-cols-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder=" " value="<?php echo isset($firstName) ? htmlspecialchars($firstName) : ''; ?>">
                <label for="firstName">First Name</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder=" " value="<?php echo isset($lastName) ? htmlspecialchars($lastName) : ''; ?>">
                <label for="lastName">Last Name</label>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder=" " value="<?php echo isset($address) ? htmlspecialchars($address) : ''; ?>">
            <label for="address">Address</label>
        </div>
        <div class="row row-cols-md-3">
            <div class="form-group">
                <select class="form-control" id="city" name="city">
                    <option value="" disabled selected>Select City</option>
                    <!-- Add city options here -->
                </select>
                <label for="city">City</label>
            </div>
                <select class="form-control" id="province" name="province">
                    <option value="" selected>Select Province</option>
                    <!-- Add province options here -->
                </select>
                <label for="province">Province</label>
                <label for="province">Province</label>
                <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder=" " value="<?php echo isset($postalCode) ? htmlspecialchars($postalCode) : ''; ?>">
            <div class="form-group">
                <input type="text" class="form-control" id="postalCode" placeholder=" ">
                <label for="postalCode">Postal Code</label>
            </div>
            <textarea class="form-control" id="aboutMe" name="aboutMe" placeholder=" "><?php echo isset($aboutMe) ? htmlspecialchars($aboutMe) : ''; ?></textarea>
        <div class="form-group">
            <textarea class="form-control" id="aboutMe" placeholder=" "></textarea>
            <label for="aboutMe">About Me</label>
        </div>
        <button type="submit" class="btn-update">
            <span>Update Profile</span>
        </button>
        <!-- Cancel Button -->
        <center>
            
            <a href="profile-display.php" class="cancel-link">
                Cancel
            </a>
        </center>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');

        // Load and sort provinces alphabetically
        fetch('ph/provinces.json')
            .then(response => {
                if (!response.ok) throw new Error('Failed to fetch provinces');
                return response.json();
            })
            .then(data => {
                // Sort provinces alphabetically by name
                data.sort((a, b) => a.name.localeCompare(b.name));

                // Populate the provinces dropdown
                provinceSelect.innerHTML = '<option value="" disabled selected>Select Province</option>';
                data.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.key; // Use `key` field as value
                    option.textContent = province.name; // Use `name` field as display
                    provinceSelect.appendChild(option);
                });
                provinceSelect.disabled = false; // Enable dropdown after loading
            })
            .catch(err => {
                console.error('Error loading provinces:', err);
                provinceSelect.innerHTML = '<option value="" disabled>Error loading provinces</option>';
            });

        // Update cities when a province is selected
        provinceSelect.addEventListener('change', () => {
            const provinceKey = provinceSelect.value;
            citySelect.innerHTML = '<option value="" disabled selected>Loading cities...</option>';
            citySelect.disabled = true;

            if (provinceKey) {
                fetch('ph/cities.json')
                    .then(response => {
                        if (!response.ok) throw new Error('Failed to fetch cities');
                        return response.json();
                    })
                    .then(data => {
                        const filteredCities = data.filter(city => city.province === provinceKey);
                        if (filteredCities.length === 0) {
                            citySelect.innerHTML = '<option value="" disabled>No cities available</option>';
                            return;
                        }

                        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';
                        filteredCities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name; // Use `name` field as value
                            option.textContent = city.name; // Use `name` field as display
                            citySelect.appendChild(option);
                        });
                        citySelect.disabled = false; // Enable dropdown after loading
                    })
                    .catch(err => {
                        console.error('Error loading cities:', err);
                        citySelect.innerHTML = '<option value="" disabled>Error loading cities</option>';
                    });
            } else {
                citySelect.innerHTML = '<option value="" disabled selected>Select a province first</option>';
                citySelect.disabled = true;
            }
        });
    });
</script>


</body>
</html>
