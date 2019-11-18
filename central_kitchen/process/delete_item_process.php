<?php
  include_once("setting.php");
  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

  if(empty($_POST["product"])){
    header("location:../delete_item.php");
  }
  else{
    $product = $_POST["product"];
  }
  $delete_item_query = "DELETE FROM item WHERE product = '{$product}'";
  $delete_item_result = @mysqli_query($connection, $delete_item_query);

  $delete_column_query ="ALTER TABLE orders DROP COLUMN {$product}";
  $delete_column_result = @mysqli_query($connection, $delete_column_query);

  if(!$delete_column_result||!$delete_item_result){
    die("<div class='text-center' style='height:500px'>
         <img src='../image/fail.png' class=' img-fluid' alt='Responsive image'>
         <br/>
         <h3>Deleting item Failed. Please try again.</h3>
         <a class=\"btn btn-warning \" style=\"width:150px\" href='../delete_item.php'>Go back</a>
       </div>");

  }
  else{
    @mysqli_close($connection);
    header("location:../item_manage.php");
  }
?>
