<?php
include "includes/header.php";
include "includes/db.php";
?>

<div class="container pt-5">

<?php

if (empty($_SESSION['cart'])) {
    echo "<h3>Your cart is empty.</h3>";
    echo "<a href='index.php' class='btn btn-primary'>Go back to shop</a>";
} else {

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        foreach ($_SESSION['cart'] as $id => $quantity) {
            $stmt = $conn->prepare("SELECT stock FROM products WHERE id = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch();

            if(!$product) continue;

            $currentStock = $product['stock'];

            if($currentStock < $quantity){
                echo "<div class='alert alert-danger'>
                        Not enough stock for products ID $id
                      </div>";
                continue;
                  
            }

            $stmt = $conn->prepare(
                "INSERT INTO orders (product_id, quantity) VALUES (?, ?)"
                );
                $stmt->execute([$id, $quantity]);

    
                $stmt = $conn->prepare(
                    "UPDATE products SET stock = stock - ? WHERE id = ?"
                    );
                    $stmt->execute([$quantity, $id]);   
        }

        
        unset($_SESSION['cart']);

        echo "
        <div class='alert alert-success text-center'>
            <h4>Order placed successfully! 🛒</h4>
            <p>You will be redirected shortly...</p>
        </div>
        ";

        echo "
        <script>
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 3000);
        </script>
        ";

    } else {
?>

        <h2 class="mb-4">Checkout</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card p-4 shadow-sm">

                    <form method="POST">

                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Card Number</label>
                            <input type="text" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">
                            Place Order
                        </button>

                    </form>

                </div>

            </div>
        </div>

<?php
    }
}
?>

</div>

<?php include "includes/footer.php"; ?>