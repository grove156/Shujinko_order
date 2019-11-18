<?php
  include_once("setting.php");
  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");
  include_once("top.php");
  include_once("admin_manageuser_bar.php");
  echo"<hr/>";
  $view_user_query = "SELECT branch, password FROM user";
  $view_user_result = mysqli_query($connection, $view_user_query);
  $view_user_row = mysqli_fetch_row($view_user_result);
  echo"<div class='m-4 row'>";
  echo"<table class='table text-center'>";
  echo"<thead class='thead-dark'>
          <tr>
            <th>ID</th><th>Password</th>
          </tr>
      </thead>";
  while($view_user_row){
        echo"
            <tr>
              <td>{$view_user_row[0]}</td><td>{$view_user_row[1]}</td>
            </tr>
        ";
        $view_user_row=mysqli_fetch_row($view_user_result);
  }
  echo"</table>";
  echo"</div>";

  @mysqli_close($connection);

  include_once("bottom.php");
?>
