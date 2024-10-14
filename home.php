<?php 
session_start();
?>

<div id="content" class="text-center">
    <div class="search-bar mt-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for Products..." aria-label="Search">
            <button class="btn btn-primary" type="button" id="search-button">
                <i class="bi bi-search"></i> 
            </button>
        </div>
    </div>
</div>


<style>
    .search-bar {
        width: 150%;
        position: relative;
        margin-top: 0;
        right : 50px;
        bottom: 250px;
    }
    
    .bi-search {
        font-size: 25px;
    }

    .btn-primary {
        background-color: gray;
        border-color: gray;
        width: 100px;
    }
    
    .btn-primary:hover {
        border-color: transparent;
        background-color: darkgray;
    }

    .form-control {
        height: 60px;
        font-size: 24px;
    }

    .btn {
        height: 60px; 
    }

    @media (max-width: 576px) {
        .search-bar {
            width: 100%; /* Adjust for smaller devices */
            right : 0px;
        bottom: 0px;
        }

        .form-control {
            height: 50px; /* Smaller input field for mobile */
            font-size: 18px;
        }

        .btn {
            height: 50px; /* Match button height on mobile */
        }
    }
</style>

<!-- Include Bootstrap's JavaScript bundle and icon library (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
