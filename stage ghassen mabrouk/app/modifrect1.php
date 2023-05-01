<?php 
session_start();
$a=$_POST['num'];
$f=$_POST['sujet'];
$g=$_POST['message'];


$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");
$req="UPDATE reclamer
SET subject = '$f', message = '$g'
WHERE num='$a'" ;
 mysqli_query($cnx,$req) or die("erreur");
 $_SESSION["num"]=$a;
	header("location:userrec.php") ;

?>
