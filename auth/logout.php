<?php
session_start();
unset($_SESSION['user']);

header("Location: /ski-project/index.php");
exit();