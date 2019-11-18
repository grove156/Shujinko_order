<?php
  $fetch_user_query ="SELECT Branch FROM user";
  $fetch_user_result = mysqli_query($connection, $fetch_user_query);
  $fetch_user_row = mysqli_fetch_row($fetch_user_result);
?>
<form action='process/search_order.php' method='POST'>
  <h4>Search orders</h4>
  <div class='row' stlye='height:200px' >

      <div class='col-4'><label>Location</label>
        <select class='form-control' name='branch'>
          <?php
           while($fetch_user_row){
             if($fetch_user_row[0] != "admin")
              echo"<option>{$fetch_user_row[0]}</option>";
              $fetch_user_row = mysqli_fetch_row($fetch_user_result);
           }
          ?>
        </select>
      </div>
      <div class='col-3'><label>From</label><input class='form-control' type='text'name='from' placeholder='yyyy-mm-dd'></div>
      <div class='col-3'><label>to</label><input class='form-control' type='text' name='to' placeholder='yyyy-mm-dd'></div>
      <div class='col-2'><br/><input class='btn btn-primary' type='submit' value='search'></div>
  </div>
</form>
<div class='row' style='height:20px'></div>
<hr/>
<?php
mysqli_close($connection);

?>
