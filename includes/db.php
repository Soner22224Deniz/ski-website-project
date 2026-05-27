<?php

try {
    $conn = new PDO(
        "mysql:host=localhost;port=3307;dbname=ski_project;charset=utf8",
        "root",
        ""
    );

    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}