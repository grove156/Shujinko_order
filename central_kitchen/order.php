<?php
include("process/setting.php");
include("template/top.php");
$connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
@mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");
$orderform_query = "SELECT * FROM item";
$orderform_result =@mysqli_query($connection,$orderform_query);
$orderform_row = mysqli_fetch_row($orderform_result);
?>
<form action='process/order_process.php' class='text-center border' method='POST'>
  <div class='row text-center'>
    <div class='col-6'><label><h6>Delivery Date (yy/mm/dd)</h6></label></div>
    <div class='col-2'><input type= 'text' class ='form-control text-right' name='year' value='<?php echo"".date("y").""?>'></div>
    <div class='col-2'><input type= 'text' class ='form-control text-right' name='month' value='<?php echo"".date("m").""?>'></div>
    <div class='col-2'><input type= 'text' class ='form-control text-right' name='day' value='<?php echo"".date("d").""?>'></div>
  </div>
  <table class='table'>
      <thread>
          <tr>
              <th>Product</th>
              <th>Portion</th>
              <th>QTY</th>
          </tr>
      </thread>
    <?php
        while($orderform_row){
          echo"
              <thread>
                <tr>
                    <td>{$orderform_row[1]}</td>
                    <td>{$orderform_row[2]}</td>
                    <td><input class='form-control text-right' type='text' name='{$orderform_row[1]}' value='0'></td>
                </tr>
              </thread>
              ";
              $orderform_row = mysqli_fetch_row($orderform_result);
        }
    ?>
  </table>
  <div class="text-right">
      <input type="submit" class="btn btn-primary " value="Order">
  </div>
</form>
<?php
include("template/bottom.php");
mysqli_close($connection);
?>
