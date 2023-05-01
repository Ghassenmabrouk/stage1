<?php 
$a = $_POST['ban_nom'];

$cnx = mysqli_connect("localhost", "root", "");
mysqli_select_db($cnx, "foot");




$req ="INSERT INTO register SELECT * FROM ban where nom='$a'";

$req1 = "DELETE FROM `ban` WHERE `ban`.`nom` = '$a'";


mysqli_query($cnx, $req) or die("erreur");
mysqli_query($cnx, $req1) or die("erreur");

header("location:userslist.php");
?>