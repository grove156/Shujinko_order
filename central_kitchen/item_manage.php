<?php
include_once("process/setting.php");

$connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
@mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

include_once("template/top.php");
include_once("template/admin_manage_item_bar.php");

$fetch_item_query = "SELECT product, portions FROM item";
$fetch_item_result = @mysqli_query($connection, $fetch_item_query);
$fetch_item_row = @mysqli_fetch_row($fetch_item_result);
echo"<form action='process/update_item_process.php' method='POST'>";
echo"<table class='table'>";
echo"<thead class='thead-dark'>";
echo"<tr>
        <th>Product</th><th>Portion</th>
     </tr></thead>
";
while($fetch_item_row = @mysqli_fetch_row($fetch_item_result)){
    echo"
      <tr>
        <td>{$fetch_item_row[0]}</td><td><input class='form-control' type='text' name='{$fetch_item_row[0]}' value='{$fetch_item_row[1]}'/></td>
      </tr>
    ";
}
echo"</table>
  <input class='btn btn-primary' type='submit' value='Update'/>
</form>";
include_once("template/bottom.php");
?>
