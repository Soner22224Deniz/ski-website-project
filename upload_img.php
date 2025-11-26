<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $targetDir = "uploads/";

  
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;

 
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        exit;
    }

    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "Image uploaded successfully!<br>";
        echo "<img src='$targetFile' width='200'>";
    } else {
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Image Upload</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
