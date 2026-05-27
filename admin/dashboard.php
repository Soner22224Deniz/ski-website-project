<?php
include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/db.php";


if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    header("Location: /ski-project/index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['product_id'];
    $amount = $_POST['amount'];

   
    if (isset($_POST['increase_stock']) && $amount > 0) {
        $stmt = $conn->prepare(
            "UPDATE products SET stock = stock + ? WHERE id = ?"
        );
        $stmt->execute([$amount, $id]);
    }

   
    if (isset($_POST['decrease_stock']) && $amount > 0) {

        $stmt = $conn->prepare("SELECT stock FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch();

        if ($product && $product['stock'] >= $amount) {
            $stmt = $conn->prepare(
                "UPDATE products SET stock = stock - ? WHERE id = ?"
            );
            $stmt->execute([$amount, $id]);
        }
    }

    header("Location: dashboard.php");
    exit();
}
?>

<div class="container pt-5">

    <h1 class="mb-4 text-center admin-title">Admin Dashboard</h1>

  
    <div class="row g-4">

       
        <div class="col-md-3">
            <div class="card admin-card bg-primary text-white text-center p-3">
                <h5>Products Sold</h5>
                <?php
                $stmt = $conn->query("SELECT SUM(quantity) as total FROM orders");
                $result = $stmt->fetch();
                echo "<h3>" . ($result['total'] ?? 0) . "</h3>";
                ?>
            </div>
        </div>

      
        <div class="col-md-3">
            <div class="card admin-card bg-success text-white text-center p-3">
                <h5>Lessons Booked</h5>
                <?php
                $stmt = $conn->query("SELECT COUNT(*) as total FROM lessons");
                $result = $stmt->fetch();
                echo "<h3>" . $result['total'] . "</h3>";
                ?>
            </div>
        </div>

        
        <div class="col-md-3">
            <div class="card admin-card bg-warning text-dark text-center p-3">
                <h5>Website Visits</h5>
                <?php
                $stmt = $conn->query("SELECT COUNT(*) as total FROM visits");
                $result = $stmt->fetch();
                echo "<h3>" . $result['total'] . "</h3>";
                ?>
            </div>
        </div>

     
        <div class="col-md-3">
            <div class="card admin-card bg-dark text-white text-center p-3">
                <h5>Total Users</h5>
                <?php
                $stmt = $conn->query("SELECT COUNT(*) as total FROM users");
                $result = $stmt->fetch();
                echo "<h3>" . $result['total'] . "</h3>";
                ?>
            </div>
        </div>

    </div>

    
    <div class="mt-5">

        <h3 class="mb-3">Manage Products</h3>

        <table class="table table-dark table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Update Stock</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $stmt = $conn->query("SELECT * FROM products");

            foreach ($stmt as $product) {
                echo "<tr>
                    <td>{$product['name']}</td>
                    <td>\${$product['price']}</td>
                    <td>{$product['stock']}</td>

                    <td>
                        <form method='POST' style='display:flex; gap:5px; justify-content:center;'>

                            <input type='hidden' name='product_id' value='{$product['id']}'>

                            <input type='number' name='amount' min='1'
                                   class='form-control form-control-sm'
                                   style='width:80px;' required>

                            <button name='increase_stock' class='btn btn-success btn-sm'>+</button>
                            <button name='decrease_stock' class='btn btn-warning btn-sm'>-</button>

                        </form>
                    </td>

                    <td>
                        <a href='delete_product.php?id={$product['id']}'
                           class='btn btn-danger btn-sm'
                           onclick=\"return confirm('Are you sure?')\">
                           Delete
                        </a>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>

        <a href="add_product.php" class="btn btn-success mt-3">
            Add New Product
        </a>

    </div>

   
    <div class="mt-5">

        <h3 class="mb-3">Order History</h3>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $stmt = $conn->query("
                SELECT orders.*, products.name 
                FROM orders
                JOIN products ON orders.product_id = products.id
                ORDER BY orders.created_at DESC
            ");

            foreach ($stmt as $order) {
                echo "<tr>
                    <td>{$order['id']}</td>
                    <td>{$order['name']}</td>
                    <td>{$order['quantity']}</td>
                    <td>{$order['created_at']}</td>
                </tr>";
            }
            ?>

            </tbody>
        </table>

    </div>

</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/ski-project/includes/footer.php"; ?>