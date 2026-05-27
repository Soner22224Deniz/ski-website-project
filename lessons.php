<?php
include "includes/header.php";

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "includes/db.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $level = $_POST['level'];

   
    $stmt = $conn->prepare(
        "INSERT INTO lessons (name, email, date, level) VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([$name, $email, $date, $level]);

    $success = true;
}

?>

<div class="container pt-5">

    <h1 class="text-center mb-4">Book a Ski Lesson</h1>

    <?php if ($success): ?>

        <div class="alert alert-success text-center">
            <h4>Success! Lesson Booked 🎿</h4>
            <p>You will be redirected to the homepage shortly.</p>
        </div>

       
        <script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
        </script>

    <?php else: ?>

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3 text-center">Enter Your Details</h4>

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
                            <label class="form-label">Preferred Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Skill Level</label>
                            <select name="level" class="form-select">
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                            </select>
                        </div>

                        <button class="btn btn-primary w-100">
                            Book Lesson
                        </button>

                    </form>

                </div>

            </div>
        </div>

    <?php endif; ?>

</div>

<?php include "includes/footer.php"; ?>