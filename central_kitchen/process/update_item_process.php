<?php
  include_once("setting.php");
  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

  $fetch_item_query = "SELECT product, portions FROM item";
  $fetch_item_result = @mysqli_query($connection, $fetch_item_query);
  $fetch_item_row = @mysqli_fetch_row($fetch_item_result);

  while($fetch_item_row = @mysqli_fetch_row($fetch_item_result)){
    ${$fetch_item_row[0]} = $_POST["{$fetch_item_row[0]}"];

    if(${$fetch_item_row[0]} != $fetch_item_row[1]){
      $update_item_query = "UPDATE item SET portions = '".${$fetch_item_row[0]}."' WHERE portions = '".$fetch_item_row[1]."' AND product = '".$fetch_item_row[0]."'";
      $update_item_result = @mysqli_query($connection, $update_item_query);
      if(!$update_item_result){
        die("<div class='text-center' style='height:500px'>
             <img src='../image/fail.png' class=' img-fluid' alt='Responsive image'>
             <br/>
             <h3>Update Failed. Please try again.</h3>
             <a class=\"btn btn-warning \" style=\"width:150px\" href='../item_manage.php'>Go back</a>
           </div>");

      }
    }
  }
  @mysqli_close($connection);
  header("location:../item_manage.php");
?>
