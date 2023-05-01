<?php 
$a=$_POST['name'];
$b=$_POST['email'];
$c=$_POST['country'];
$d=$_POST['number'];
$e=$_POST['gender'];
$f=$_POST['password'];
$g=$_FILES['pic'];
$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");
$image = addslashes(file_get_contents($g['tmp_name']));
$sql = "UPDATE register SET   gmail='$b', country='$c', number='$d', pass='$f',gender='$e',picture='$image' WHERE nom='$a'";
 mysqli_query($cnx,$sql) or die("erreur");
 echo $a;
	header("location:edit.php") ;

?>