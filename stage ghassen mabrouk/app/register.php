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

if(empty($g) || $g['error'] == UPLOAD_ERR_NO_FILE) {
  $image = "file:///C:/wamp64/www/ghassen%20mabrouk%20dsi%203.3/copy/Nouveau%20dossier/deflt.jpg";
} else {
  $image = addslashes(file_get_contents($g['tmp_name']));
}

$req="insert into register values('$a','$b','$c','$d','$e','$f','$image')" ;
 mysqli_query($cnx,$req) or die("erreur");
 header("location:login.html") ;
?>
