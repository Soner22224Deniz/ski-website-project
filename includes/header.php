<?php
session_start();

if (!isset($_SESSION['users']['admin@mail.com'])) {
    $_SESSION['users']['admin@mail.com'] = [
        "username" => "Admin",
        "password" => "admin123",
        "is_admin" => 1
    ];
}
?>      

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>222-ski</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="/ski-project/css/style.css?v=1">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">222-ski</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
           <li class="nav-item"><a class="nav-link" href="/ski-project/index.php">Home</a></li>
           <li class="nav-item"><a class="nav-link" href="/ski-project/index.php#shop">Shop</a></li>
           <li class="nav-item"><a class="nav-link" href="/ski-project/cart.php">Cart</a></li>
           <li class="nav-item"><a class="nav-link" href="/ski-project/lessons.php">Lessons</a></li>
           <li class="nav-item"><a class="nav-link" href="/ski-project/contact.php">Contact</a></li>
           </ul>

           <ul class="navbar-nav ms-auto">

          <?php if (isset($_SESSION['user'])): ?>

          <li class="nav-item">
          <span class="nav-link">
            Hello, <?php echo $_SESSION['user']['username']; ?>
          </span>
          </li>

        <?php if ($_SESSION['user']['is_admin'] == 1): ?>
        <li class="nav-item">
            <a class="nav-link" href="#">Admin Panel</a>
        </li>
       <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link" href="/ski-project/auth/logout.php">Logout</a>
    </li>

    <?php else: ?>

    <li class="nav-item">
        <a class="nav-link" href="/ski-project/auth/login.php">Login</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/ski-project/auth/register.php">Register</a>
    </li>

    <?php endif; ?>

        </ul>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
