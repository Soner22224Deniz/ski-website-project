<?php
include "../includes/header.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

  
    $_SESSION['users'][$email] = [
        "username" => $username,
        "password" => $password,
        "is_admin" => 0
    ];

    $message = "Registration successful!";
}
?>

<div class="container pt-5">
    <h2>Register</h2>

    <?php if ($message) echo "<p>$message</p>"; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary">Register</button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>
