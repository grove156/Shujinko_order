<?php
  SESSION_START();
  $branch = $_SESSION["ID"];
  date_default_timezone_set('Australia/Melbourne');
  if(empty($branch)){
    header("location:../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewpoint" content="width = device-width">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<title>Shujinko Order</title>
</head>
<body>
    <div class="container">
      <div class="text-center" style="height:250px"><img src="../image/shujinkologo.jpg" class="img-fluid" alt="Responsive image"></div>
        <div class="p-4 row border bg-secondary text-white rounded-lg" style="height: 100px;">
          <?php
            if($branch =="admin"){
          ?>
          <div class="col-3 text-center"><a class="btn btn-secondary " style="width:150px" href="../user_manage.php" role="button">Manage User</a></div>
          <div class="col-3 text-center"><a class="btn btn-secondary " style="width:150px" href="../item_manage.php" role="button">Manage Items</a></div>
          <div class="col-3 text-center"><a class="btn btn-secondary " style="width:150px" href="../view_order.php" role="button">View Order</a></div>
          <div class="col-3 text-center"><a class="btn btn-secondary " style="width:150px" href="../logout.php" role="button">Log out</a></div>
          <?php
          }
            else{
          ?>
              <div class="col-4 text-center"><a class="btn btn-secondary " style="width:150px" href="../order.php" role="button">Order</a></div>
              <div class="col-4 text-center"><a class="btn btn-secondary " style="width:150px" href="../view_order.php" role="button">View Order</a></div>
              <div class="col-4 text-center"><a class="btn btn-secondary " style="width:150px" href="../logout.php" role="button">Log out</a></div>

        <?php
            }
        ?>
        </div>
        <div class='row' style='height:10px'></div>
        <div class="border text-center rounded-lg">
