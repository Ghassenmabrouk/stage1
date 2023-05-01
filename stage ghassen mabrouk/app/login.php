<!doctype html>
<html>
<head>
<?php 
session_start();
$a=$_POST['name'];
$b=$_POST['pass'];
$cnx=mysqli_connect("localhost" ,"root","");
mysqli_select_db($cnx,"foot");

 //$req1="select * from register where pass='$b'";
//$res1=mysqli_query($cnx,$req1);
$req1="select pass from register where nom='$a'";
$req2="select pass from admin where nom='$a'";

$res=mysqli_query($cnx,$req1);
$res2=mysqli_query($cnx,$req2);
$row=mysqli_fetch_assoc($res);
$row2=mysqli_fetch_assoc($res2);

//$c=floatval($row['pass']);



//if($row['pass']!=$b){
	if($row['pass']!=$b||$row2['pass']!=$b){
	echo "no user found please register";
header("location:register.html"); }

//if($row['pass']==$b){
	if($row2['pass']==$b){
 //if($c!="0"){
	$_SESSION["name"] = $a;
	header("location:try.php") ;
}if($row['pass']==$b){
	$_SESSION["name"] = $a;
header("location:tryy.php"); } 

 ?>
</head>
</html>







	
