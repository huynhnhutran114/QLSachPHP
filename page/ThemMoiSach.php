<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Them mot cuon sach</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <form name="CreateBook" onsubmit="return validated()" enctype="multipart/form-data" action="../Config/CreateBook.php" method="post">
        <div class="container-fluid">
            <div class="row align-center mb-5 mt-5">
                <div class="com-md-12">
                    <h1>
                        Thêm một đầu sách mới
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
                    <input class="form-control" class="form-control" type="text" name="txtTenSach" />
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
                    <textarea class="form-control" row="4" type="text" name="txtNoiDungTomTat"></textarea>
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
        echo ' <option value="' . $category['CategoryID'] . '" data-value="' . $category['CategoryID'] . '">' . $category['CategoryName'] . '</option>';
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
                    <input class="form-control" type="text" name="txtTacGia" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Năm xuất bản</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="txtBookYear" />
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
        echo ' <option value="' . $publisher['PublisherID'] . '" data-value="' . $publisher['PublisherID'] . '">' . $publisher['PublisherName'] . '</option>';
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
                    <input class="form-control" type="text" name="txtGiaTien" />
                </div>
            </div>
        </div>
        <a class="btn btn-outline-info" href="TrangChu.php">Trở về trang chủ </a>
        <input class="btn btn-outline-success" type="submit" value="Thêm Sách"></a>
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
        var title = document.forms["CreateBook"]["txtTenSach"].value;
        var descri = document.forms["CreateBook"]["txtNoiDungTomTat"].value;
        var author = document.forms["CreateBook"]["txtTacGia"].value;
        var bookYear = document.forms["CreateBook"]["txtBookYear"].value;
        var price = document.forms["CreateBook"]["txtGiaTien"].value;
        var image = document.forms["CreateBook"]["mainPicture"].files.length;
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