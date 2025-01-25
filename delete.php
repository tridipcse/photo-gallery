<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $id = intval($_POST['photo_id']);
    if (!empty($id))
    {
        $sql = $conn->query("SELECT * FROM photos WHERE id = $id");
        if($sql->num_rows > 0){
        $result = mysqli_fetch_assoc($sql);
        // delete file from directory
        unlink($result['image_path']);
        // delete record from DB
        $query = $conn->query("DELETE FROM photos WHERE id = $id");
        header('Location: index.php');
        exit;
        }
    }
}

