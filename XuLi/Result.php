<?php
include_once "./config.php";
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