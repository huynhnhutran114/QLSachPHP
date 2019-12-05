<?php
include_once "./config.php";
$connection = new Connection();
$db = $connection->getConnection();
$title = $_POST["txtTenSach"];
$decri = $_POST["txtNoiDungTomTat"];
$category = $_POST["cmbTheLoai"];
$author = $_POST["txtTacGia"];
$bookYear = $_POST["txtBookYear"];
$published = $_POST["cmbNhaXuatBan"];
$price = $_POST['txtGiaTien'];
try {
    $file_name = '';
    if (isset($_FILES['mainPicture'])) {
        $errors = array();
        $file_name = time() . $_FILES['mainPicture']['name'];
        // die($file_name);
        $file_size = $_FILES['mainPicture']['size'];
        $file_tmp = $_FILES['mainPicture']['tmp_name'];
        $file_type = $_FILES['mainPicture']['type'];

        $arr_tye = explode('.', $file_name);
        $file_ext = strtolower(end($arr_tye));
        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            echo "<script type='text/javascript'>alert('Chỉ hỗ trợ upload file  JPG, JPEG hoặc PNG.');window.location.replace('./../page/TimSach.php');</script>";
            die();
        }

        if ($file_size > 2097152) {
            echo "<script type='text/javascript'>alert('Kích thước file không được lớn hơn 2MB');window.location.replace('./../page/TimSach.php');</script>";
            die();
        }
        $img = "../Images/" . $file_name;
        move_uploaded_file($file_tmp, $img);
    }

    $sql = "INSERT INTO book(BookTitle, BookDesc, BookCatID, BookAuthor, BookPubID, BookPic,  BookYear, BookPrice, BookRate) VALUES(" .
        "'$title','$decri',$category,'$author',$published, '$file_name',$bookYear,$price,5)";
    if ($db->query($sql)) {
        echo "<script> alert('thêm sách thành công!!!'); window.location= '../page/TimSach.php'; </script>";
        echo "query: " . $sql;

    } else {
        echo "<script> alert('thêm sách thất bại!!!'); </script>";
        echo "query: " . $sql;
    }
} catch (Exception $e) {
    echo "<script> alert('$e->getMessage()'); </script>";
}