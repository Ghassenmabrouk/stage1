<?php 
session_start();
$a=$_POST['num'];
$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");

 $_SESSION["num"]=$a;
	header("location:res2.php") ;

?>
