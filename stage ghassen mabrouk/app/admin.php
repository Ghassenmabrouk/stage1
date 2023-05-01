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
$image =addslashes(file_get_contents($g['tmp_name']));
$req="insert into admin values('$a','$b','$c','$d','$f','$e','$image')" ;
 mysqli_query($cnx,$req) or die("erreur");
	header("location:try.php") ;

?>