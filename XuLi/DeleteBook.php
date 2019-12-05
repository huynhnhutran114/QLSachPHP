<?php
include_once "./config.php";
$connection = new Connection();
$db = $connection->getConnection();
$BookID = $_GET["id"];
try {
    $sql = "DELETE FROM book WHERE BookID = " . $BookID;
    $result = $db->exec($sql);
    if ($result) {
        echo "<script> alert('Xoá thành công!!!');
        window.location= '../page/TimSach.php'; </script>";
    } else {
        echo "<script> alert('Xoá thất bại!!!');
        window.location= '../page/TimSach.php'; </script>";
    }
} catch (Exception $ex) {
    die("Sign up failed! errors: " . $ex->getMessage());
}