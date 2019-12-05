<html>
<?php
include_once './../XuLi/config.php';
$connection = new Connection();
$cnn = $connection->getConnection();
$id = $_GET['id'];

$book = $cnn->query("SELECT * FROM book Where BookID =" . $id)->fetch(PDO::FETCH_ASSOC);
if (empty($book)) {
    echo "<script> alert('không tìm thấy sách!!!');
            window.history.back(); </script>";
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sua thong tin sach</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <form name="EditBook" onsubmit="return validated()" enctype="multipart/form-data" action="../Config/EditBook.php" method="post">
        <div class="container-fluid">
            <div class="row align-center mb-5 mt-5">
                <div class="com-md-12">
                    <h1>
                        Sửa thông tin sách....
                    </h1>
                </div>
            </div>
        </div>
        <h3>Thông tin sách</h3>
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Tựa sách</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="txtTenSach"
                        value="<?php echo $book['BookTitle']; ?>" />
                        <input class="form-control" type="hidden" name="txtID"
                        value="<?php echo $book['BookID']; ?>" />
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Hình bìa</h5>
                </div>
                <div class="col-md-4">
                    <input class="btn btn-outline-warning" type="file" id="mainPicture" name="mainPicture" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Nội dung tóm tắt</h5>
                </div>
                <div class="col-md-4">
                    <textarea class="form-control" row="4" type="text"
                        name="txtNoiDungTomTat"> <?php echo $book['BookDesc']; ?> </textarea>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Thể loại</h5>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="cmbTheLoai" id="cmbTheLoai">
                        <?php
$c = 1;
include_once "../XuLi/config.php";
$connection = new Connection();
$db = $connection->getConnection();
$query = 'select * from category';
$categories = $db->query($query);
if (!empty($categories)) {
    foreach ($categories as $category) {
        if ($book['BookCatID'] == $category['CategoryID']) {
            echo ' <option value="' . $category['CategoryID'] . '" data-value="' . $category['CategoryID'] . '" selected>' . $category['CategoryName'] . '</option>';
        } else {
            echo ' <option value="' . $category['CategoryID'] . '" data-value="' . $category['CategoryID'] . '" selected>' . $category['CategoryName'] . '</option>';
        }

    }
}
?>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Danh sách tên tác giả</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="txtTacGia"
                        value="<?php echo $book['BookAuthor']; ?>" />
                </div>
            </div>
            <div class=" row mb-4">
                <div class="col-md-4">
                    <h5>Năm xuất bản</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="txtBookYear"
                        value="<?php echo $book['BookYear']; ?>" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Nhà xuất bản</h5>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="cmbNhaXuatBan" id="cmbNhaXuatBan">
                        <?php
$c = 1;
include_once "../XuLi/config.php";
$connection = new Connection();
$db = $connection->getConnection();
$query = 'select * from publisher';
$publishers = $db->query($query);
if (!empty($publishers)) {
    foreach ($publishers as $publisher) {
        if ($book['PublisherID'] == $category['PublisherID']) {
            echo ' <option value="' . $publisher['PublisherID'] . '" data-value="' . $publisher['PublisherID'] . '" selected>' . $publisher['PublisherName'] . '</option>';
        } else {
            echo ' <option value="' . $publisher['PublisherID'] . '" data-value="' . $publisher['PublisherID'] . '">' . $publisher['PublisherName'] . '</option>';
        }

    }
}
?>
                    </select>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Giá tiền</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="txtGiaTien"
                        value="<?php echo $book['BookPrice']; ?>" />
                </div>
            </div>
        </div>
        <a class=" btn btn-outline-info" href="../index.php">Trở về trang chủ </a>
        <input class="btn btn-outline-success" type="submit" value="Sửa Sách"></a>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    function validated() {
        var title = document.forms["EditBook"]["txtTenSach"].value;
        var descri = document.forms["EditBook"]["txtNoiDungTomTat"].value;
        var author = document.forms["EditBook"]["txtTacGia"].value;
        var bookYear = document.forms["EditBook"]["txtBookYear"].value;
        var price = document.forms["EditBook"]["txtGiaTien"].value;
        var image = document.forms["EditBook"]["mainPicture"].files.length;
        if (title == "") {
            alert("Tiêu đề không được trống");
            return false;
        } else if (image == 0) {
            alert("hình ảnh bìa sách không được trống");
            return false;
        } else if (descri == "") {
            alert("mô tả sách không được trống");
            return false;
        } else if (author == "") {
            alert("tác giả không được trống");
            return false;
        } else if (bookYear == "") {
            alert("năm xuất bản không được trống");
            return false;
        } else if (price == "") {
            alert("giá sách không được trống");
            return false;
        }

        return true;

    }
    </script>

</body>

</html>