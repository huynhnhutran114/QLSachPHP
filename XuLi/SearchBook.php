<?php
include_once "./config.php";
$connection = new Connection();
$db = $connection->getConnection();
$search = $_POST["search"];
$sql = "Select * from book where BookTitle like '%" . $user . "%'";
// echo $sql;
try {
    $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        header('Location:./../index.php');
    } else {
        echo "Sign up failed!";
    }
} catch (Exception $ex) {
    echo "Sign up failed! errors: " . $ex->getMessage();
}
