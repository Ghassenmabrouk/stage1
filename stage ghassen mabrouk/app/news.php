<!doctype html>
<?php 
session_start();
?>
<html>

<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>try</title>
 <link rel="stylesheet" href="try.css">
 
</head>
<body>
<?php
	$a=$_SESSION["name"] ;
$cnx=mysqli_connect("localhost","root","");
mysqli_select_db($cnx,"foot");
$q="select * from register where nom='$a'";

$res=mysqli_query($cnx,$q);
while ($row=mysqli_fetch_assoc($res))
{
	?>
      <header>
	   <div class="dropdown">
    <input type="checkbox" id="dropdown-toggle">
    <label class="dropbtn" for="dropdown-toggle">
     <img src="data:image/jpeg;base64,<?php echo base64_encode($row ['picture']); ?>" width='200' height='200' >
      <span class="name"><a><?php echo $_SESSION["name"] ?></a></span>
    </label>
    <div class="dropdown-content">
      <a href="login.html">Disconnect</a>
	  <a href="edit.php">settings</a>
	  
    </div>
  </div>
		<nav>
			<ul>
				<li><a href="tryy.php">Home</a></li>
				
				
				<li><a href="reclamer1.php">REC</a></li>
			</ul>
		</nav>


	</header>
	
<section>
<h1>Welcome Mr/Mrs <?php echo $_SESSION["name"] ?></h1>
		<h2>NOthing new for now come back later and stay updated </h2>
		
	</section>


 <?php
}
    ?>
	<footer>
		<p>&copy; All rights reserved.</p>
	</footer>
</body>

</html>