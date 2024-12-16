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
.section_2 {
            display: flex;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
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
        }
        .tabs .active {
            font-weight: bold;
            border-bottom: 2px solid black;
            padding-bottom: 5px;
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
