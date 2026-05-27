<?php
include "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {

    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }

    
    header("Location: cart.php");
    exit();
}


?>


<section class="intro d-flex align-items-center justify-content-center text-white text-center">
    <div class="overlay"></div>

    <div class="intro-content">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">Shop for equipment or book a lesson</p>
        <a href="lessons.php" class="btn btn-primary mt-3">Book a Lesson</a>
    </div>
</section>




<section id="shop" class="bg-light text-center">
    <div class="container">
        <h2 class="mb-5">Ski Equipment</h2>


<?php
include "includes/db.php";

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">

<?php foreach ($products as $product): ?>

    <div class="col-md-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 18rem;">

            <img src="images/products/<?php echo $product['image']; ?>" class="card-img-top">

            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $product['name']; ?></h5>

                <p class="card-text">$<?php echo $product['price']; ?></p>

                <p class="text-muted">
                    In stock: <?php echo $product['stock']; ?>
                </p>

                <?php if($product['stock'] > 0): ?>

                <a href="add_to_cart.php?id=<?php echo $product['id']; ?>" 
                   class="btn btn-primary">
                   Add to Cart
                </a>

                <?php else: ?>

                    <button class="btn btn-secondary" disabled>
                        Out of Stock
                    </button>

                <?php endif; ?>

            </div>

        </div>
    </div>

<?php endforeach; ?>

</div>

  
</section>

<?php include "includes/footer.php"; ?>