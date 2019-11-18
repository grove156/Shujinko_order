<?php
include_once("process/setting.php");

$connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
@mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");
$fetch_item_query = "SELECT product, portions FROM item";
$fetch_item_result = @mysqli_query($connection, $fetch_item_query);
$fetch_item_row = @mysqli_fetch_row($fetch_item_result);

include_once("template/top.php");
include_once("template/admin_manage_item_bar.php");
?>
  <form action='process/delete_item_process.php' method='POST'>
    <table class='table'>
        <thead class='thead-dark'>
          <tr>
            <th>Product</th><th>Delete</th>
          </tr>
        </thead>
        <?php
          while($fetch_item_row = @mysqli_fetch_row($fetch_item_result)){
            echo"<tr>
                    <td>{$fetch_item_row[0]}</td>
                    <td><form action='process/delete_item_process.php' method='POST'>
                    <input type='hidden' name='product' value='{$fetch_item_row[0]}'>
                    <input class='btn btn-secondary' type='submit' value='Delete'/>
                    </form>
                    </td>
                </tr>";
          }
        ?>
    </table>
  </form>
<?php
include_once("template/bottom.php");
?>
