<?php
  include_once("setting.php");
  SESSION_START();
  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewpoint" content="width = device-width, initial-scale=1.5">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<title>Shujinko Order</title>
</head>
<body>
  <?php
        if(!empty($_POST["id"]) && !empty($_POST["password"])){
              $loginid = $_POST["id"];
              $password = $_POST["password"];
              $login_query = "SELECT * FROM user where branch = '".$loginid."'";
              $login_query_result =@mysqli_query($connection,$login_query);
    		      $login_query_row = mysqli_fetch_row($login_query_result);
              if(!$login_query_row){
                  die("
                  <div class='text-center'>
                  <h2>Your ID does not exist.</h2><a class=\"btn btn-warning \" style=\"width:150px\" href='../login.php'>Go back</a>
                  </div>");
              }
              elseif($login_query_row[1] == "admin" && $login_query_row[2] == $password){
                $_SESSION["ID"] = $login_query_row[1];
                header("location:../view_order.php");
              }
              elseif($login_query_row[1] == $loginid  && $login_query_row[2] == $password){
                $_SESSION["ID"] = $login_query_row[1];
                header("location:../order.php");
              }
              elseif($login_query_row[1] == $loginid  && $login_query_row[2] != $password){
                die("
                <div class='text-center'>
                <h2>Your Password is wrong.</h2><a class=\"btn btn-warning \" style=\"width:150px\" href='../login.php'>Go back</a>
                </div>");
              }
              else{
                  die("<div class='text-center'>
                  <h2>Your input was wrong.</h2><a class=\"btn btn-warning \" style=\"width:150px\" href='../login.php'>Go back</a>
                  </div>");
              }

        }




        @mysqli_close($connection);

  ?>
</body>
