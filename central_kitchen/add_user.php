<?php
  include_once("template/top.php");
  include_once("template/admin_manageuser_bar.php");
?>
  <hr/>
  <form action='process/add_user_process.php' method='POST'>
    <div class='p-4 row text-left'>
    <lebel><h4>ID:</h4></lebel>
    <input class='form-control' type='text' name='create_id'/>
    <br/><br/><br/>
    <lebel><h4>Password:</h4></lebel>
    <input class='form-control' type='password'  name='create_password'/>
    <br/><br/><br/>
    <lebel><h4>Password confirm:</h4></lebel>
    <input class='form-control' type='password'  name='create_password_confirm'/>
    <br/><br/><br/>
    </div>
    <div class='text-right'>
    <input class='btn btn-primary' type='submit' value='Create user'>
    </div>

  </form>
<?php
  include_once("template/bottom.php");
?>
