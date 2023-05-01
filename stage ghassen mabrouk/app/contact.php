<?php 
$a=$_POST['name'];
$b=$_POST['email'];
$c=$_POST['message'];
$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");
$req="insert into contacts values('$a','$b','$c')" ;
 mysqli_query($cnx,$req) or die("erreur");
	header("location:home.html") ;

?>