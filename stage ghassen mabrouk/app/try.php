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
 <style> img {
  vertical-align: middle;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
  
}</style>
</head>
<body>
<?php
	$a=$_SESSION["name"] ;
$cnx=mysqli_connect("localhost","root","");
mysqli_select_db($cnx,"foot");
$q="select * from admin where nom='$a'";

$res=mysqli_query($cnx,$q);

while ($row=mysqli_fetch_assoc($res))
{
	?>
      <header>
	   <div class="dropdown">
    <input type="checkbox" id="dropdown-toggle">
    <label class="dropbtn" for="dropdown-toggle">
     <img src="data:image/jpeg;base64,<?php echo base64_encode($row ['picture']); ?>" width='200' height='200' >
      <span class="name"><a><?php echo $_SESSION["name"] ;?></a></span>
    </label>
    <div class="dropdown-content">
      <a href="login.html">Disconnect</a>
	  <a href="edit.php">settings</a>
	  <a href="admin1.php">add admin</a>
	  <a href="userslist.php">usereslist</a>
    </div>
  </div>
		<nav>
			<ul>
				
				
				<li><a href="userslist">Users</a></li>
				<li><a href="res.php">ListREC</a></li>
			</ul>
		</nav>


	</header>
	
<section>
welcome <a><?php echo $_SESSION["name"] ;?></a> i hope it s a good day.
		<h2>About Us</h2>
		<p>Our company, ETEG Electric, specializes in industrial engineering. Within this field of activity, we handle the design, assembly, maintenance, and upkeep of electromechanical systems. As a result, our services have the experience and expertise to study, plan, execute, and estimate the necessary budget for such operations and to lead or accompany a project until its completion</p>
		<a href="http://www.eteg-group.com" class="button">Learn More</a>
	</section>


 <?php

}

    ?>
	<footer>
		<p>&copy; All rights reserved.</p>
	<a href="https://www.facebook.com/profile.php?id=100068486276180"> <img src="fb.png" alt="Facebook Icon"  /></a>
		<img src="insta.jpg" alt="insta Icon" />
		<img src="twi.png" alt="twi Icon" />
	</footer>
</body>

</html>