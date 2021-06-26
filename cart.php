<?php
session_start();
require 'connection.php';
$conn = Connect();

?>

<html>

  <head>
    <title> 2000FOOD </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/cart.css">
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
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="contactus.php">Liên hệ</a></li>

          </ul>

<?php
if (isset($_SESSION['login_user1']))
{

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Chào mừng <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="edit_food_items.php">Giao diện quản lý</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2']))
{
?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Chào mừng <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Chọn món </a></li>
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng
             (<?php
    if (isset($_SESSION["cart"]))
    {
        $count = count($_SESSION["cart"]);
        echo "$count";
    }
    else echo "0";
?>)
              </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất </a></li>
          </ul>
  <?php
}
else
{

?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Đăng kí <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> Đăng kí người dùng</a></li>

            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> Đăng nhập người dùng</a></li>
              <li> <a href="managerlogin.php"> Đăng nhập quản lý</a></li>
            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>

    
<?php
if (!empty($_SESSION["cart"]))
{
?>
  <div class="container">
      <div class="jumbotron">
        <h1>Giỏ hàng của bạn</h1>
        
      </div>
      
    </div>
    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="40%">Tên món</th>
<th width="10%">Số lượng</th>
<th width="20%">Đơn giá</th>
<th width="15%">Tổng giá món</th>
<th width="10%">Thao tác</th>
</tr>
</thead>


<?php

    $total = 0;
    foreach ($_SESSION["cart"] as $keys => $values)
    {
?>
<tr>
<td><?php echo $values["food_name"]; ?></td>
<td><?php echo $values["food_quantity"] ?></td>
<td> <?php echo $values["food_price"]; ?> VND</td>
<td> <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?> VND</td>
<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Loại bỏ</span></a></td>
</tr>
<?php
        $total = $total + ($values["food_quantity"] * $values["food_price"]);
    }
?>  
<tr>
<td colspan="3" align="right">Tổng</td>
<td align="right"> <?php echo number_format($total, 2); ?> VND</td>
<td></td>
</tr>
</table>
<?php
    echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa giỏ hàng</button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning">Tiếp tục đặt món</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right"><span class="glyphicon glyphicon-share-alt"></span> Đặt hàng</button></a>';
?>
</div>
<br><br><br><br><br><br><br>
<?php
}

if (isset($_POST["add"]))
{
    if (empty($_SESSION["cart"]))
    {
?>
      <div class="container">
        <div class="jumbotron">
          <h1>Giỏ hàng của bạn</h1>
          <p>Sản phẩm đã được thêm vào giỏ hàng! Bấm vào <a href="index.php">ĐÂY</a> để mua tiếp</p>
          <p>Bấm vào <a href="cart.php">ĐÂY</a> để thanh toán ngay !</p>
          
        </div>
      
      </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    }

}
else if (empty($_SESSION["cart"]))
{
?>
  <div class="container">
      <div class="jumbotron">
        <h1>Giỏ hàng của bạn</h1>
        <p>Xin lỗi! Giỏ hàng của bạn chưa có món ăn, quay lại để <a href="index.php">đặt món.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>


<?php

if (isset($_POST["add"]))
{
    if (isset($_SESSION["cart"]))
    {
        $item_array_id = array_column($_SESSION["cart"], "food_id");
        if (!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["cart"]);

            $item_array = array(
                'food_id' => $_GET["id"],
                'food_name' => $_POST["hidden_name"],
                'food_price' => $_POST["hidden_price"],
                'R_ID' => $_POST["hidden_RID"],
                'food_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
        }
        else
        {
            $count = count($_SESSION["cart"]);

            $item_array = array(
                'food_id' => $_GET["id"],
                'food_name' => $_POST["hidden_name"],
                'food_price' => $_POST["hidden_price"],
                'R_ID' => $_POST["hidden_RID"],
                'food_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'food_id' => $_GET["id"],
            'food_name' => $_POST["hidden_name"],
            'food_price' => $_POST["hidden_price"],
            'R_ID' => $_POST["hidden_RID"],
            'food_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
if (isset($_GET["action"]))
{
    if ($_GET["action"] == "delete")
    {
        foreach ($_SESSION["cart"] as $keys => $values)
        {
            if ($values["food_id"] == $_GET["id"])
            {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Food has been removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}

if (isset($_GET["action"]))
{
    if ($_GET["action"] == "empty")
    {
        foreach ($_SESSION["cart"] as $keys => $values)
        {

            unset($_SESSION["cart"]);
            echo '<script>alert("Cart is made empty!")</script>';
            echo '<script>window.location="cart.php"</script>';

        }
    }
}

?>
<?php
?>

    </body>
</html>
