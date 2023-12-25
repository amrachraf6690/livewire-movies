<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TV Movies</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.1.0/css/flag-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300&display=swap" rel="stylesheet">

    @livewireStyles
    <style>
        *{
            font-family: 'Chivo', sans-serif;
        }
        .custom-form {
            background-color: #f8f9fa; /* Background color */
            border: 1px solid #dee2e6; /* Border color */
            padding: 10px; /* Padding */
            border-radius: 10px;
            margin-bottom: 8px;
        }

        .custom-input {
            background-color: #fff; /* Input field background color */
            border: 1px solid #ced4da; /* Input field border color */
            border-radius: 5px; /* Border radius for input field */
            /* Remove blue border on focus */
            outline: none !important;
            box-shadow: none !important;
        }

        .custom-btn:hover {
            background-color: #6c757d; /* Button background color */
            border-color: #6c757d; /* Button border color */
            color: #fff; /* Button text color */
            border-radius: 5px; /* Border radius for button */
        }

        body {
            background-color: #f4f4f4;
        }

        .list-group-item {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #333;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
<div class="container mt-4">
    <livewire:home />
</div>

<footer class="text-center bg-body-tertiary">
    <!-- Grid container -->
    <div class="container pt-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://facebook.com/amrachraf6690"
                role="button"
                target="_blank"
                data-mdb-ripple-color="dark"
            ><i class="fab fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://x.com/amrachraf6690"
                role="button"
                target="_blank"
                data-mdb-ripple-color="dark"
            ><i class="fab fa-twitter"></i
                ></a>

            <!-- Instagram -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://instagram.com/amrachraf6690"
                role="button"
                target="_blank"
                data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://linkedin.com/in/amrachraf6690"
                role="button"
                target="_blank"
                data-mdb-ripple-color="dark"
            ><i class="fab fa-linkedin"></i
                ></a>
            <!-- Github -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://github.com/amrachraf6690"
                role="button"
                target="_blank"
                data-mdb-ripple-color="dark"
            ><i class="fab fa-github"></i
                ></a>

            <!-- Whatsapp -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://wa.me/+201028751528"
                role="button"
                target="_blank"
                data-mdb-ripple-color="dark"
            ><i class="fab fa-whatsapp"></i
                ></a>

            <!-- Mobile -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="tel:+201028751528"
                role="button"
                data-mdb-ripple-color="dark"
            ><i class="fa fa-phone"></i
                ></a>
        </section>
        <!-- Section: Social media -->
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #2828280C;">
        <p>Designed with <span class="text-danger">&hearts;</span> by <a href="https://wa.me/+201028751528" target="_blank">AAA</a></p>
        <p><small>{{today()->format('Y/m/d {D}')}}</small></p>
    </div>
    <!-- Copyright -->
</footer>
<!-- Bootstrap JS and dependencies (optional, for certain components) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@livewireScripts

</body>

</html>
