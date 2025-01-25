<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $title = $_POST['title'];
    $image = $_FILES['image'];
    $dir = "uploads/";
    if (isset($image) && $image['tmp_name'] !== "")
    {
        $file_path = $dir . basename($image['name']);
        // move uploaded to desired directory
        move_uploaded_file($image['tmp_name'], $file_path);
        // insert data to database
        $result = $conn->query("INSERT INTO photos(title,image_path) VALUES('$title','$file_path')");
        if ($result)
        {
            header('Location: index.php');
            exit;
        }

    }
}
?>
