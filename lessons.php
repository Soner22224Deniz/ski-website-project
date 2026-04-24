<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: index.php");
    exit();
}

?>

<?php include "includes/header.php"; ?>

<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Book a Ski Lesson</h1>

    <form method="POST" action="">

        
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

       
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

     
        <div class="mb-3">
            <label class="form-label">Phone (optional)</label>
            <input type="text" name="phone" class="form-control">
        </div>

      
        <div class="mb-3">
            <label class="form-label">Preferred Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

       
        <div class="mb-3">
            <label class="form-label">Skill Level</label>
            <select name="level" class="form-select" required>
                <option value="">Select level</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </div>

       
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>

<?php include "includes/footer.php"; ?>
