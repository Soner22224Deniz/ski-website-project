<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            $message = "Email already exists!";
        } else {
            
            $stmt = $conn->prepare(
                "INSERT INTO users (username, email, password) VALUES (?, ?, ?)"
            );

            $stmt->execute([$username, $email, $hashedPassword]);

            $message = "Registration successful!";
        }

    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
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
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary">Register</button>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/footer.php"; ?>