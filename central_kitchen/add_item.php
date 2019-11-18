<?php
include_once("process/setting.php");
include_once("template/top.php");
include_once("template/admin_manage_item_bar.php");
?>
  <form class='p-4' action='process/add_item_process.php' method='POST'>
    <div class='row'>
      <div class='col-6'><h3>Product Name</h3></div>
      <div class='col-6'><h3>Product Portion</h3></div>
    </div>
    <br/>
    <div class='row'>
      <div class='col-6'><input class='form-control' type='text' name='product' placeholder='Enter new item name'/></div>
      <div class='col-6'><input class='form-control'type='text' name='portion' placeholder='Enter new item portion'/></div>
    </div>
    <br/>
    <div class='text-right'>
        <input class='btn btn-primary' type='submit' value='Add Item'/>
    </div>
  </form>
<?php
include_once("template/bottom.php");
?>
