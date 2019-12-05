<?php
include_once "./config.php";
$connection = new Connection();
$db = $connection->getConnection();
$user = $_POST["userName"];
$pass = $_POST["password"];
$sql = "Select * from customer where userName = '" . $user . "' and Password = '" . $pass . "';";
// echo $sql;
try {
    $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if (!empty($result)) {
        echo ("đăng nhập thành công!!! xin chào: " . $result['userName']); 
    } else {
        echo "Sign up failed!";
    }
} catch (Exception $ex) {
    echo "Sign up failed! errors: " . $ex->getMessage();
}
