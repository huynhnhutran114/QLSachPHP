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
        <h1 class="text pt-2">Đăng ký</h1>
          <div class="jumbotron  w-75">
          <form name = "DKUser" action="dangky.php" method="post" onSubmit="return validated();">
            <div>
              <label class="group-title" for="">
                  Tên đăng nhập:
              </label>
              <input type="text"  id="userName" name="userName" placeholder="Tên đăng nhập"/>
            </div>
            <div class="group-input">
                <label class="group-title" for="">
                    Mật khẩu:
                </label>
                <input type="password"  id="password" name="password" placeholder="Mật khẩu"/>
            </div>
            <p style="padding-left:155px;">(Tối thiểu 5 ký tự)</p>
            <div class="group-input">
              <label class="group-title" for="">
                  Gõ lại mật khẩu:
              </label>
              <input type="password"  id="confirmPassword" name="confirmPassword" placeholder="Gõ lại mật khẩu"/>
            </div>
            <input class="btn btn-primary btn-small" type="submit" value="Đăng ký"/>
            <input id="deleted" onclick="xoa();"  class="btn btn-primary btn-small" type="button" value="Xóa"/>
            </form>
          </div>
      </section>
  </div>
  <script type="text/javascript">
      function xoa(){
            var deleted = document.querySelector("#deleted");
            var userName = document.getElementById("userName").value="";
            var password = document.getElementById("password").value= "";
            var confirmPassword = document.getElementById("confirmPassword").value= "";
      }
      function validated()
      {
        var userName = document.forms["DKUser"]["userName"].value;
        var password = document.forms["DKUser"]["password"].value;
        var confirmPassword = document.forms["DKUser"]["confirmPassword"].value;
        if (userName=="")
          {
            alert("Ten dang nhap khong duoc trong");
            document.forms["DKUser"]["userName"].focus();
            return false;
          }
        else if (password=="")
          {
            alert("Mat khau khong duoc trong");
            document.forms["DKUser"]["password"].focus();
            return false;
          }
        else if (password!==confirmPassword)
          {
            alert("Mat khau go lai khong trung khop");
            document.forms["DKUser"]["confirmPassword"].focus();
            return false;
          }
          
        return true;
        
      }
  </script>

</body>
</html>
