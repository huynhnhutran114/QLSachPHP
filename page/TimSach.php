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
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
        <script language="javascript">
             
            function load_ajax()
            {
                $.ajax({
                    url : "../XuLi/Result.php", // gửi ajax đến file Result.php
                    type : "post", // chọn phương thức gửi là get
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                         'search' : $('#search').val()
                    },
                    success : function (result){
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        // đó vào thẻ div có id = result
                        $('#result').html(result);
                    }
                });
            } 
     </script>
</head>

<body>
    <div class="main">
        <section class="body-content d-flex justify-content-center align-items-center flex-column">
            <h1 class="text pt-2">Đăng nhập</h1>
            <div class="jumbotron  w-75">
                <a href="../index.php" class="btn btn-primary btn-small"> Trang chủ </a>
                <a href="./ThemMoiSach.php"><input class="btn btn-primary btn-small" type="button"
                        value="Thêm mới" /></a>


                    <input class="form-control mr-sm-2" type="text" id="search" name="search"
                        placeholder="Tên sách" />
                    <button class="btn btn-outline-success btn-rounded btn-sm my-3" type="button" onclick="load_ajax()">Tìm kiếm </button>
            </div>
        </section>
        <div id='result'>

        </div>
    </div>

</body>

</html>