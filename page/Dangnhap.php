<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang Chu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

  <style>
      h1{
          text-align: center;
          text-transform:uppercase;
      }
      .group-title{
        width:150px;
      }
  </style>

</head>
<body>
  <div class="main">
      <section class="body-content d-flex justify-content-center align-items-center flex-column">
        <h1 class="text pt-2">Đăng nhập</h1>
          <div class="jumbotron  w-75">
          <form name = "DKUser" method="post" onSubmit="return validated();">
            <div>
              <label class="group-title" for="">
                  Tên đăng nhập:
              </label>
              <input type="text"  id="username" name="userName" placeholder="Tên đăng nhập"/>
            </div>
            <div class="group-input">
                <label class="group-title" for="">
                    Mật khẩu:
                </label>
                <input type="password"  id="password" name="password" placeholder="Mật khẩu"/>
            </div>
            <input class="btn btn-primary btn-small" type="submit"  value="Đăng Nhập">
            </form>
          </div>
      </section>
  </div>
  <script type="text/javascript">

      function validated()
      {
        var userName = document.forms["DKUser"]["userName"].value;
        var password = document.forms["DKUser"]["password"].value;
        if (userName=="")
          {
            alert("Ten dang nhap khong duoc trong");
            document.forms["DKUser"]["userName"].focus();
            return false;
          }
        if (password=="")
          {
            alert("Mat khau khong duoc trong");
            document.forms["DKUser"]["password"].focus();
            return false;
          }
                $.ajax({
                    url : "../XuLi/DangNhap.php", // gửi ajax đến file 
                    type : "post", // chọn phương thức gửi là get
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                         'userName' : userName,
                         'password' : password,
                    },
                    success : function (result){
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        // đó vào thẻ div có id = result
                        alert(result);
                    }
                });
   
        return true;

      }
  </script>

</body>
</html>
