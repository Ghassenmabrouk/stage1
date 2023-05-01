<?php 
$a = $_POST['ban_nom'];

$cnx = mysqli_connect("localhost", "root", "");
mysqli_select_db($cnx, "foot");
$req1 = "DELETE FROM `register` WHERE `register`.`nom` = '$a'";


$req ="INSERT INTO ban SELECT * FROM register where nom='$a'";
mysqli_query($cnx, $req) or die("erreur");
mysqli_query($cnx, $req1) or die("erreur");

header("location:userslist.php");
?>