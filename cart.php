<?php
include "includes/header.php";
include "includes/functions.php";

$products = getProducts();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['product_id'];

    if (isset($_POST['increase'])) {
        $_SESSION['cart'][$id]++;
    }

    if (isset($_POST['decrease'])) {
        $_SESSION['cart'][$id]--;

        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }

    if (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$id]);
    }

    header("Location: cart.php");
    exit();
}
?>

<div class="container pt-5">
    <h1 class="mb-4 text-center">Your Cart</h1>

    <?php
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<p class='text-center'>Your cart is empty.</p>";
    } else {

        $total = 0;
        ?>

        <div class="row justify-content-center">

        <?php
        foreach ($_SESSION['cart'] as $id => $quantity) {

            $product = $products[$id];
            $subtotal = $product['price'] * $quantity;
            $total += $subtotal;
            ?>

            <div class="col-md-8">
                <div class="card mb-3 p-3">
                    <div class="row align-items-center">

                       
                        <div class="col-md-2">
                            <img src="<?php echo $product['image']; ?>" class="img-fluid">
                        </div>

                        
                        <div class="col-md-4">
                            <h5><?php echo $product['name']; ?></h5>
                            <p>Price: $<?php echo $product['price']; ?></p>
                        </div>

                        
                        <div class="col-md-3 text-center">

                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <button name="decrease" class="btn btn-sm btn-outline-secondary">-</button>
                            </form>

                            <span class="mx-2"><?php echo $quantity; ?></span>

                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <button name="increase" class="btn btn-sm btn-outline-secondary">+</button>
                            </form>

                        </div>

                       
                        <div class="col-md-3 text-end">

                            <p class="mb-1 fw-bold" style="white-space: nowrap;">
                                $<?php echo $subtotal; ?>
                            </p>

                            <form method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <button name="remove" class="btn btn-danger btn-sm">Remove</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        <?php } ?>

        </div> 

        <div class="text-center mt-4">
            <h3>Total: $<?php echo $total; ?></h3>

            <a href="checkout.php" class="btn btn-success mt-3">
                Proceed to Checkout
            </a>
        </div>

    <?php } ?>
</div>

<?php include "includes/footer.php"; ?>
