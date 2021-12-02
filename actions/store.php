<?php

if (isset($_POST['title']) && !empty($_POST['title'])) {
    
    require '../connection.php';

    $title = $_POST['title'];

    $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
    $res = $stmt->execute([$title]);

    if ($res) {
        header("Location: ../index.php?message=success"); 
    } else {
        header("Location: ../index.php?message=error");
    }

    $conn = null;
    exit();
} else {
    header("Location: ../index.php?error=required");
}