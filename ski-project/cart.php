<?php
session_start();
include "includes/header.php";
include "includes/functions.php";

$products = getProducts();
?>

<div class="container mt-5 pt-5">
    <h1 class="mb-4">Your Cart</h1>

    <?php
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
    } else {

        $total = 0;

        foreach ($_SESSION['cart'] as $id => $quantity) {

            $product = $products[$id];
            $subtotal = $product['price'] * $quantity;
            $total += $subtotal;
            ?>

            <div class="card mb-3 p-3">
                <div class="row align-items-center">

                    <div class="col-md-3">
                        <img src="<?php echo $product['image']; ?>" class="img-fluid">
                    </div>

                    <div class="col-md-6">
                        <h5><?php echo $product['name']; ?></h5>
                        <p>Price: $<?php echo $product['price']; ?></p>
                        <p>Quantity: <?php echo $quantity; ?></p>
                    </div>

                    <div class="col-md-3 text-end">
                        <p><strong>$<?php echo $subtotal; ?></strong></p>
                    </div>

                </div>
            </div>

        <?php } ?>

        <h3>Total: $<?php echo $total; ?></h3>

        <a href="checkout.php" class="btn btn-success mt-3">Proceed to Checkout</a>

    <?php } ?>
</div>

<?php include "includes/footer.php"; ?>