<?php
include_once "config.php";
$connection = new Connection();
$db = $connection->getConnection();
$user = $_POST["userName"];
$pass = $_POST["password"];
$sql = "INSERT INTO customer(userName,Password) VALUE ('" . $user . "','" . $pass . "');";
try {
    $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo "<script> alert('đăng ký thành công!!!'); </script>";
    } else {
        echo "Sign up failed!";
    }

} catch (Exception $ex) {
    echo "Sign up failed! errors: " . $ex->getMessage();
}
