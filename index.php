<?php
session_start();

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

include "includes/header.php";
?>


<section class="intro d-flex align-items-center justify-content-center text-white text-center">
    <div class="overlay"></div>

    <div class="intro-content">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">Short intro text...</p>
        <a href="lessons.php" class="btn btn-primary mt-3">Book a Lesson</a>
    </div>
</section>




<section id="shop" class="bg-light text-center">
    <div class="container">
        <h2 class="mb-5">Ski Equipment</h2>

        <div class="row justify-content-center">

            
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/products/product1.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Ski Boots</h5>
                        <p class="card-text">Short description...</p>
                        <form method="POST" action="">
                           <input type="hidden" name="product_id" value="1">
                           <button type="submit" name="add_to_cart" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </form>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/products/product2.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Ski Jacket</h5>
                        <p class="card-text">Short description...</p>
                             <form method="POST" action="">
                           <input type="hidden" name="product_id" value="2">
                           <button type="submit" name="add_to_cart" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </form>
                    </div>
                </div>
            </div>

         
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/products/product3.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Ski Goggles</h5>
                        <p class="card-text">Short description...</p>
                             <form method="POST" action="">
                           <input type="hidden" name="product_id" value="3">
                           <button type="submit" name="add_to_cart" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </form>
                    </div>
                </div>
            </div>

           
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/products/product4.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Ski Helmet</h5>
                        <p class="card-text">Short description...</p>
                             <form method="POST" action="">
                           <input type="hidden" name="product_id" value="4">
                           <button type="submit" name="add_to_cart" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </form>
                    </div>
                </div>
            </div>

           
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/products/product5.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Ski Gloves</h5>
                        <p class="card-text">Short description...</p>
                             <form method="POST" action="">
                           <input type="hidden" name="product_id" value="5">
                           <button type="submit" name="add_to_cart" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </form>
                    </div>
                </div>
            </div>

           
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/products/product6.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Ski Poles</h5>
                        <p class="card-text">Short description...</p>
                             <form method="POST" action="">
                           <input type="hidden" name="product_id" value="6">
                           <button type="submit" name="add_to_cart" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>