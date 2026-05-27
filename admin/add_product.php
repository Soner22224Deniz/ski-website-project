<?php
include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/db.php";


if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    header("Location: /ski-project/index.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $stock = $_POST['stock'];

    try {
        $stmt = $conn->prepare(
            "INSERT INTO products (name, price, image, stock) VALUES (?, ?, ?, ?)"
        );

        $stmt->execute([$name, $price, $image, $stock]);

   
        header("Location: dashboard.php");
        exit();

    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<div class="container pt-5">
    <h2>Add Product</h2>

    <?php if ($message) echo "<div class='alert alert-danger'>$message</div>"; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Product Name</label>
            <input class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label>Price ($)</label>
            <input type="number" step="0.01" class="form-control" name="price" required>
        </div>

        <div class="mb-3">
            <label>Image filename</label>
            <input class="form-control" name="image" placeholder="ski.jpg" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" class="form-control" name="stock" required>
        </div>

        <button class="btn btn-success">Add Product</button>

    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/footer.php"; ?>