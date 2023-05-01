<?php 
$a = $_POST['num'];

$cnx = mysqli_connect("localhost", "root", "");
mysqli_select_db($cnx, "foot");

$req1 = "DELETE FROM reclamer WHERE num = '$a'";
mysqli_query($cnx,$req1) or die("erreur");
header("location:userrec.php");
?>