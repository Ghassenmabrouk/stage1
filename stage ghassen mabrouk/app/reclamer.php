<?php 
$a=$_POST['nom'];
$b=$_POST['email'];
$c=$_POST['tel'];
$d=$_POST['sujet'];
$e=$_POST['message'];
$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");
$req="insert into reclamer(nom,gmail,phone,subject,message	)
 values('$a','$b','$c','$d','$e')" ;
 mysqli_query($cnx,$req) or die("erreur");
	header("location:tryy.php") ;

?>