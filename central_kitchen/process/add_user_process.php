<?php
  include_once("setting.php");
  $connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
  @mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");

  if(!empty($_POST["create_id"])&&!empty($_POST["create_password"])&&!empty($_POST["create_password_confirm"])){

    $id = $_POST["create_id"];
    $password = $_POST["create_password"];
    $password_confirm = $_POST["create_password_confirm"];

    if($password != $password_confirm){
      die("<div class='text-center' style='height:500px'>
           <img src='../image/fail.png' class=' img-fluid' alt='Responsive image'>
           <br/>
           <h3>Password check Please.</h3>
           <a class=\"btn btn-warning \" style=\"width:150px\" href='../add_user.php'>Go back</a>
         </div>");
    }
  }
  else{
    die("<div class='text-center' style='height:500px'>
         <img src='../image/fail.png' class='img-fluid' alt='Responsive image'>
         <br/>
         <h3>Your input was wrong. Please, try again!</h3>
         <a class=\"btn btn-warning \" style=\"width:150px\" href='../add_user.php'>Go back</a>
       </div>");

  }

  $add_user_query = "INSERT INTO user(branch, password) VALUES ('".$id."','".$password."')";
  $add_user_result = @mysqli_query($connection, $add_user_query);

  if($add_user_result){
    echo"
        <div class='text-center' style='height:500px'>
          <img src='../image/complete.jpg' class=' img-fluid' alt='Responsive image'>
          <br/>
          <h3>ID successfully created!</h3>
        </div>
    ";
  }
  else{
    echo"
      <div class='text-center' style='height:500px'>
        <img src='../image/fail.png' class=' img-fluid' alt='Responsive image'>
        <br/>
        <h3>Create user failed. Please, try again!</h3>
      </div>
    ";

  }
  @mysqli_close($connection);
?>
