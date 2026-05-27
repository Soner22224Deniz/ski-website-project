<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "username" => $user['username'],
                    "email" => $user['email'],
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

    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
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
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success">Login</button>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/footer.php"; ?>