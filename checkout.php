<?php
include "includes/header.php";
include "includes/functions.php";

$products = getProducts();


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}


$order_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_success = true;

    
    unset($_SESSION['cart']);
}
?>

<div class="container mt-5 pt-5">

    <h1 class="mb-4">Checkout</h1>

    <?php if ($order_success): ?>

       
        <div class="alert alert-success">
            <h4>Order placed successfully!</h4>
            <p>Thank you for your purchase.</p>
        </div>

        <a href="index.php" class="btn btn-primary">Back to Home</a>

    <?php else: ?>

        <div class="row">

        
            <div class="col-md-6">
                <h3>Order Summary</h3>

                <?php
                $total = 0;

                foreach ($_SESSION['cart'] as $id => $quantity) {

                    $product = $products[$id];
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                    ?>

                    <p>
                        <?php echo $product['name']; ?> 
                        (x<?php echo $quantity; ?>) 
                        - $<?php echo $subtotal; ?>
                    </p>

                <?php } ?>

                <hr>
                <h4>Total: $<?php echo $total; ?></h4>
            </div>

         
            <div class="col-md-6">
                <h3>Your Details</h3>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Place Order
                    </button>

                </form>
            </div>

        </div>

    <?php endif; ?>

</div>

<?php include "includes/footer.php"; ?>
