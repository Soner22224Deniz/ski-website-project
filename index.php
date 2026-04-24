<?php include "includes/header.php"; ?>

<style>
.intro {
    height: 100vh;
    background: url('images/background/hero.jpg') center/cover no-repeat;
    position: relative;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
}

.intro-content {
    position: relative;
    z-index: 2;
}

section {
    padding: 80px 0;
}
</style>


<section class="intro d-flex align-items-center justify-content-center text-white text-center">
    <div class="overlay"></div>

    <div class="intro-content">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">Short intro text...</p>
        <a href="lessons.php" class="btn btn-primary mt-3">Get Started</a>
    </div>
</section>


<section class="bg-light text-center">
    <div class="container">
        <h2>About Ski Culture</h2>
        <p>Placeholder text...</p>
    </div>
</section>


<section class="text-center">
    <div class="container">
        <h2>Famous Skiers</h2>

        <div class="row mt-4">
            <div class="col-md-4">Card</div>
            <div class="col-md-4">Card</div>
            <div class="col-md-4">Card</div>
        </div>
    </div>
</section>


<section class="bg-light text-center">
    <div class="container">
        <h2>Equipment Stores</h2>
        <a href="#" class="btn btn-outline-dark m-2">Store 1</a>
        <a href="#" class="btn btn-outline-dark m-2">Store 2</a>
    </div>
</section>


<section class="text-center">
    <div class="container">
        <h2>Contact</h2>
        <p>Phone: +000 000 000</p>
    </div>
</section>

<?php include "includes/footer.php"; ?>
