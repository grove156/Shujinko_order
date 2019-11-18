<?php
include("setting.php");
include("top.php");

$connection = @mysqli_connect($host,$user,$pswd,$dbnm) or die("Server is not working at the moment. plz try later");
@mysqli_select_db($connection,$dbnm) or die("Server is not working at the moment. plz try later");
$item_fetch_query = "SELECT * FROM item";
$item_fetch_result =@mysqli_query($connection,$item_fetch_query);
$item_fetch_row = mysqli_fetch_row($item_fetch_result);

if(isset($_POST["year"])&&isset($_POST["month"])&&isset($_POST["day"])){
 $date = "20".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."";
}

$order_atr ="";
$value_atr ="";

while($item_fetch_row){
 ${$item_fetch_row[1]} = $_POST["{$item_fetch_row[1 ]}"];
 $order_atr .= ", ". $item_fetch_row[1] ."";
 $value_atr .= ", '". ${$item_fetch_row[1]} ."'";
 $item_fetch_row = mysqli_fetch_row($item_fetch_result);
}
$insert_order_query = "INSERT INTO orders(Branch, Delivery_date".$order_atr.") VALUES('".$branch."','".$date."'".$value_atr.")";
$insert_order_result = @mysqli_query($connection,$insert_order_query);

if($insert_order_result){
   echo"
       <div class='text-center' style='height:500px'>
         <img src='../image/complete.jpg' class=' img-fluid' alt='Responsive image'>
         <br/>
         <h3>Your order successfully completed!</h3>
       </div>
   ";
}
else{
 echo"
   <div class='text-center' style='height:500px'>
     <img src='../image/fail.png' class=' img-fluid' alt='Responsive image'>
     <br/>
     <h3>Your order failed. Please, try again!</h3>
   </div>
 ";
}
include("bottom.php");

@mysqli_close($connection);


?>
