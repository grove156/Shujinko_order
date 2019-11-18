<?php
  include_once("setting.php");
  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

  if(empty($_POST["product"])||empty($_POST["product"])){
    header("loaction:../add_item.php");
  }
  else{
    $product = $_POST["product"];
    $portion = $_POST["portion"];
  }

  $add_item_query = "INSERT INTO item(product, portions) VALUES('".$product."','".$portion."')";
  $add_item_result = @mysqli_query($connection, $add_item_query);

  $add_column_query = "ALTER TABLE orders ADD COLUMN ".$product." int";
  $add_column_result = @mysqli_query($connection, $add_column_query);

  if(!$add_item_result||!$add_column_result){
    die("<div class='text-center' style='height:500px'>
         <img src='../image/fail.png' class=' img-fluid' alt='Responsive image'>
         <br/>
         <h3>Adding new item Failed. Please try again.</h3>
         <a class=\"btn btn-warning \" style=\"width:150px\" href='../add_item.php'>Go back</a>
       </div>");

  }
  else{
    @mysqli_close($connection);
    header("location:../item_manage.php");
  }
?>
