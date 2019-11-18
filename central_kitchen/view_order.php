<?php
include("process/setting.php");
include("template/top.php");
$connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
@mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");


if($branch=="admin"){
    $date = date("Y-m-d");
    $view_order_total_query ="SELECT * FROM orders WHERE Delivery_date = '".$date."'";
    $view_order_total_result = @mysqli_query($connection, $view_order_total_query);
    $view_order_total_row =  mysqli_fetch_assoc($view_order_total_result);
    include_once("template/admin_vieworder_bar.php");
    echo"<h3>order today</h3>";
    while($view_order_total_row){
        echo"<div class='row'>";
        echo"<table class='table text-center'>";
        echo"<thead class='col-6 thead-dark'><th>".$view_order_total_row["Branch"]."</th><th>".$view_order_total_row["Delivery_date"]."</th></thead>";
        echo"<tr>
                <th>Items</th><th>QTY</th>
            </tr>";
      foreach($view_order_total_row as $field => $item){
          if($item>0&& $field != "Order_id" && $field != "Branch" && $field != "Delivery_date"){
              echo"
                  <tr>
                    <td>".$field."</td><td>".$item."</td>
                  </tr>
              ";
          }

        }
      echo"</table>";
      echo"</div>";
      echo"<div class='row' style='height:50px'></div>";
      $view_order_total_row = mysqli_fetch_assoc($view_order_total_result);
      }
}
else{
  $date1 = date("Y-m-d");
  $date2 = date('Y-m-d', strtotime($date1. ' - 7 days'));
  $view_order_query = "SELECT Delivery_date FROM orders WHERE Branch ='".$branch."' AND Delivery_date > '".$date2."' ORDER BY Delivery_date DESC";
  $view_order_result =@mysqli_query($connection, $view_order_query);
  $view_order_row = mysqli_fetch_row($view_order_result);

    if($view_order_row){
      echo"<table class='table text-center'>
          <thread>
            <th>By date</th>
          </thread>";
      while($view_order_row){
        echo"

            <tr>
              <td><a class='btn btn-primary' style='width:200px' href ='process/user_view_order_process.php?date=".$view_order_row[0]."' role='button'>{$view_order_row[0]}</a></td>
            </tr>
          ";
                $view_order_row = mysqli_fetch_row($view_order_result);
        }
        echo"</table>";
      }
      else{
        echo"<br/><br/><br/><h4>No orders in last 7 days</h4><br/><br/>";
      }


}
include("template/bottom.php");
@mysqli_close($connection);
?>
