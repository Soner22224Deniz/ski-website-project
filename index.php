<?php include "includes/header.php"; ?>


<section class="intro d-flex align-items-center justify-content-center text-white text-center">
    <div class="overlay"></div>

    <div class="intro-content">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">Short intro text...</p>
        <a href="lessons.php" class="btn btn-primary mt-3">Book a Lesson</a>
    </div>
</section>


<section class="text-center">
    <div class="container">
        <h2 class="mb-5">Famous Skiers</h2>

        <div class="row justify-content-center">

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/skiers/skier1.jpg" class="card-img-top" alt="Skier">
                    <div class="card-body">
                        <h5 class="card-title">Skier Name</h5>
                        <p class="card-text">Short description...</p>
                        <a href="skier.php?id=1" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/skiers/skier2.jpg" class="card-img-top" alt="Skier">
                    <div class="card-body">
                        <h5 class="card-title">Skier Name</h5>
                        <p class="card-text">Short description...</p>
                        <a href="skier.php?id=2" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card">
                    <img src="images/skiers/skier3.jpg" class="card-img-top" alt="Skier">
                    <div class="card-body">
                        <h5 class="card-title">Skier Name</h5>
                        <p class="card-text">Short description...</p>
                        <a href="skier.php?id=3" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="bg-light text-center">
    <div class="container">
        <h2>Equipment Stores</h2>

        <a href="#" class="btn btn-outline-dark m-2">Visit Store</a>
        <a href="#" class="btn btn-outline-dark m-2">Visit Store</a>
        <a href="#" class="btn btn-outline-dark m-2">Visit Store</a>
    </div>
</section>

<?php include "includes/footer.php"; ?>
