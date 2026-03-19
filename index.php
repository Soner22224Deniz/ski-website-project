<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlpineHub</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <style>
        body {
            scroll-behavior: smooth;
        }

        
        .welcome {
            height: 100vh;
            background: url('images/background/welcome.jpg') center/cover no-repeat;
            position: relative;
        }

        .welcome-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        
        section {
            padding: 80px 0;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AlpineHub</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Home</a></li>
                        <li><a class="dropdown-item" href="#">About</a></li>
                        <li><a class="dropdown-item" href="#">Skiers</a></li>
                        <li><a class="dropdown-item" href="#">Lessons</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>


<section class="welcome d-flex align-items-center justify-content-center text-center text-white">
    <div class="welcome-overlay"></div>

    <div class="welcome-content">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">Short introduction here</p>
        <a href="#" class="btn btn-primary btn-lg mt-3">Action Button</a>
    </div>
</section>


<section class="bg-light text-center">
    <div class="container">
        <h2>About Section</h2>
        <p>Placeholder text...</p>
    </div>
</section>


<section class="text-center">
    <div class="container">
        <h2>More Information</h2>
        <p>Placeholder content...</p>
    </div>
</section>


<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 AlpineHub</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>