<?php 
session_start();
$a=$_POST['num'];
$f=$_POST['D1'];
$g=$_POST['responsible'];
$b=$_POST['comment'];

$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");
$req="UPDATE reclamer
SET stats = '$f', res = '$g' , comment ='$b'
WHERE num='$a'" ;
 mysqli_query($cnx,$req) or die("erreur");
 $_SESSION["num"]=$a;
	header("location:res.php") ;

?>
