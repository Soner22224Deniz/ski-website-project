<?php
include "../includes/header.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['users'][$email])) {

        $user = $_SESSION['users'][$email];

        if ($user['password'] == $password) {

            $_SESSION['user'] = [
                "username" => $user['username'],
                "email" => $email,
                "is_admin" => $user['is_admin']
            ];

            header("Location: /ski-project/index.php");
            exit();

        } else {
            $message = "Wrong password!";
        }

    } else {
        $message = "User not found!";
    }
}
?>

<div class="container pt-5">
    <h2>Login</h2>

    <?php if ($message) echo "<p>$message</p>"; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success">Login</button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>
