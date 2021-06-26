    <?php
include('login_u.php'); 

if(isset($_SESSION['login_user2'])){
header("location: foodlist.php"); 
}
?>

<!DOCTYPE html>
<html>

  <head>
    <title> 2000FOOD </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/managerlogin.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>


    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">2000FOOD</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Trang chủ</a></li>
            <li><a href="contactus.php">Liên hệ</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Đăng kí <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> Đăng kí người dùng</a></li>
              <!-- <li> <a href="managersignup.php"> Đăng kí quản lý</a></li> -->
      
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> Đăng nhập người dùng</a></li>
              <li> <a href="managerlogin.php"> Đăng nhập quản lý</a></li>
   
            </ul>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <div class="container">
    <div class="jumbotron">
     <h1>Chào mừng tới <span class="edit"> 2000FOOD </span></h1>
     <br>
    </div>
    </div>

    <div class="container" style="margin-top: 4%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4">
        <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
      <div class="panel panel-primary">
        <div class="panel-heading"> Chọn phương thức đăng nhập </div>
        <div class="panel-body">

        <!-- Form dang nhap cua khach lai vang -->
        <form action="customer_registered_success1.php"  method="POST">
        <div style="margin-bottom:1rem"> Đăng nhập một lần </div>  
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Nhập tên của bạn: </label>
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username" placeholder="Tên tài khoản" required="" autofocus="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
            </span>
              </span>
            </div>           
          </div>
        </div>

        <div class="row" style = "display: none" >
          <div class="form-group col-xs-12">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
            <div class="input-group">
              <input class="form-control" id="password" type="password" name="password" placeholder="Mật khẩu" value="abc">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Bắt đầu đặt hàng</button>
          </div>

        </div>


        </form>
        
        <div style="margin:0.5rem 0 1.5rem 0">
          nếu bạn đã có tài khoản
        </div>


        <!-- Form dang nhap cua khach than quen -->
        <form action="" method="POST">
          
          <div class="row">
            <div class="form-group col-xs-12">
              <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Tài khoản: </label>
              <div class="input-group">
                <input class="form-control" id="username" type="text" name="username" placeholder="Tên tài khoản" required="" autofocus="">
                <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
              </span>
                </span>
              </div>           
            </div>
          </div>

          <div class="row">
            <div class="form-group col-xs-12">
              <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Mật khẩu: </label>
              <div class="input-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Mật khẩu">
                <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
              </span>
                
              </div>           
            </div>
          </div>

          <div class="row">
            <div class="form-group col-xs-4">
                <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Đăng nhập</button>
            </div>

          </div>
          <label style="margin-left: 5px;">hoặc</label> <br>
          <label style="margin-left: 5px;"><a href="customersignup.php">Trở thành khách hàng thân thiết của chúng tôi</a></label>

        </form>
        </div>     
      </div>      
    </div>
    </div>


    </body>
</html>