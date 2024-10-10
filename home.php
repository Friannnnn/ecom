<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/company_logo.jpg">
    <title>Kaisermark Powertools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.8s forwards;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome-text {
            text-align: center;
            color: white;
            font-size: 2em; /* Adjust for desktop */
        }

        @media (max-width: 576px) {
            .welcome-text {
                font-size: 1.5em; /* Adjust for mobile */
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="fade-up welcome-text">
        <h1>Welcome to Kaisermark Powertools</h1>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.fade-up').css('animation-delay', '0.5s'); // Optional delay for effect
    });
</script>

</body>
</html>
