<?php
  include_once("setting.php");

  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

  include_once("top.php");
  include_once("../template/admin_vieworder_bar.php");

  if(isset($_POST["branch"])&&isset($_POST["from"])&&isset($_POST["to"])){
      $branch = $_POST["branch"];
      $date_from = $_POST["from"];
      $date_to = $_POST["to"];
  }
  else{
    die("Input was not correct!");
  }

  $search_order_query = "SELECT * FROM orders WHERE Branch = '".$branch."' AND Delivery_date >= '".$date_from."' AND Delivery_date <= '".$date_to."'";
  $search_order_result = mysqli_query($connection, $search_order_query);
  $search_order_row = mysqli_fetch_assoc($search_order_result);

  while($search_order_row){
    echo"
        <table class='table'>
            <thead class='thead-dark'><th>".$search_order_row["Branch"]."</th><th>".$search_order_row["Delivery_date"]."</th></thead>
            <tr>
              <th>Items</th><th>QTY</th>
            </tr>

    ";
    foreach($search_order_row as $field => $item){
      if($item>0 && $field !='Order_id' && $field != 'Branch' && $field != 'Delivery_date')
        echo"<tr>
                <td>{$field}</td><td>{$item}</td>
              </tr>";
    }
    echo"</table>";
    $search_order_row = mysqli_fetch_assoc($search_order_result);
  }
  @mysqli_close($connection);

include_once("bottom.php");

?>
