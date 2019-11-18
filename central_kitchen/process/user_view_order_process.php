<?php
include("setting.php");
include("top.php");
$connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
@mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

$date = $_GET["date"];
$order_view_page_query = "SELECT * FROM orders WHERE Branch = '".$branch."' AND Delivery_date = '".$date."'";
$order_view_page_result = @mysqli_query($connection,$order_view_page_query);
$order_view_page_row = mysqli_fetch_assoc($order_view_page_result);

while($order_view_page_row){

    echo"<table class='text-center table'>";
    echo"<thead class='thead-dark'><tr>
            <th>Items</th><th>QTY</th>
        </tr></thead>";
  foreach($order_view_page_row as $field => $item){
      if($item>0 && $field != "Order_id" && $field != "Branch" && $field != "Delivery_date"){
          echo"
              <tr>
                <td>".$field."</td><td>".$item."</td>
              </tr>
          ";
      }

    }
  echo"</table>";

  $order_view_page_row = mysqli_fetch_assoc($order_view_page_result);
  }

include("bottom.php");
@mysqli_close($connection);
?>
