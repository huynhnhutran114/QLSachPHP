<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tìm sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
    h1 {
        text-align: center;
        text-transform: uppercase;
    }

    .group-title {
        width: 150px;
    }
    </style>

</head>

<body>
    <div class="main">
        <section class="body-content d-flex justify-content-center align-items-center flex-column">
            <h1 class="text pt-2">Kết Quả Tìm Kiếm</h1>
            <div>
                <?php
include_once "../XuLi/config.php";
$connection = new Connection();
$db = $connection->getConnection();
$search = $_POST["search"];
$sql = "Select * from book where BookTitle like '%" . $search . "%'";
// echo $sql;
$result = $db->query($sql);
$c = 0;
if ($result) {
    echo '<table class="table md5 mt6">
              <tr>
              <th width="50">Mã sách</th>
              <th width="100">Tựa sách</th>
              <th width="200">Mô tả sách</th>
              <th width="50">Tác giả</th>
              <th width="30">năm sản xuất</th>
              <th width="50">Giá tiền</th>
              <th width="100">chỉnh sửa</th>
              </tr>';
    foreach ($result as $value) {
        echo '
              <tr>
                  <td>' . $value['BookID'] . ' </td>
                  <td>' . $value['BookTitle'] . ' </td>
                  <td>' . $value['BookDesc'] . ' </td>
                  <td>' . $value['BookAuthor'] . ' </td>
                  <td>' . $value['BookYear'] . ' </td>
                  <td>' . $value['BookPrice'] . ' </td>
                  <td>  <a href="../XuLi/deletebook.php?id=' . $value['BookID'] . '"> <button type="button" class="btn btn-outline-danger">xoá</button> </a>
                  <a href="../XuLi/editbook.php?id=' . $value['BookID'] . '"> <button type="button" class="btn btn-outline-primary">sửa</button> </td></a>
              </tr>';
    }
}
?>
            </div>
            <div class="my-5">
                <a href="./ThemMoiSach.php"><input class="btn btn-primary btn-small" type="button"
                        value="Thêm mới" /></a>
                <a href="../index.php"><input class="btn btn-primary btn-small" type="button"
                        value="Trở về trang chủ" /></a>

            </div>
        </section>
    </div>



</body>

</html>