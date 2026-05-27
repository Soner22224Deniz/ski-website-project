<?php
include "includes/header.php";
include "includes/db.php";



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
    <h2 class="mb-4">Your Cart</h2>

    <?php
    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
    } else {
        echo "<table class='table table-bordered text-center'>";
        echo "<tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
              </tr>";

        $grandTotal = 0;

        foreach ($_SESSION['cart'] as $id => $quantity) {

           
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$product) continue;

            $total = $product['price'] * $quantity;
            $grandTotal += $total;

            echo "<tr>
                <td>{$product['name']}</td>
                <td>\${$product['price']}</td>
                <td>{$quantity}</td>
                <td>\${$total}</td>
                <td>

                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$id}'>
                        <button name='increase' class='btn btn-success btn-sm'>+</button>
                    </form>

                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$id}'>
                        <button name='decrease' class='btn btn-warning btn-sm'>-</button>
                    </form>

                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$id}'>
                        <button name='remove' class='btn btn-danger btn-sm'>Remove</button>
                    </form>

                </td>
            </tr>";
        }

        echo "</table>";

        echo "<h4 class='text-end'>Total: \$$grandTotal</h4>";

        echo "<div class='text-end'>
                <a href='checkout.php' class='btn btn-primary mt-3'>Proceed to Checkout</a>
              </div>";
    }
    ?>
</div>

<?php include "includes/footer.php"; ?>