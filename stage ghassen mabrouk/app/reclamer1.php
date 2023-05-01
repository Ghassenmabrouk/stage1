<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint</title>
	<link rel="stylesheet" type="text/css" href="rec.css">
	<style>
	body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
   background-image: url("comp.png");
  background-repeat: no-repeat;
  background-size: cover;
}

	header {
	background-color: transparent;
	padding: 10px;
	text-align: center;
	 display: flex;
  justify-content: space-between;
  align-items: center;
}

nav ul {
	margin: 0;
	padding: 0;
	list-style: none;
	display: flex;
	justify-content: center;
}

nav li {
	margin: 0 10px;
}

nav a {
	color:white;
	font-size: 18px;
	font-weight: bold;
	transition: color 0.3s ease-in-out;
}

nav a:hover {
	color: green;
}

h1 {
	margin-top: 50px;
	font-size: 42px;
}
footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  bottom: 0px;
  position: fixed;
  width: 100%; 
}


.dropdown {
  position: relative;
  color: white;
}

.dropbtn {
  background-color: transparent;
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
  padding: 10px;
  display: flex;
  align-items: center;
}

.dropbtn img {
  vertical-align: middle;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
  
}

.dropdown-content {
	color: white;
  display: none;
  position: absolute;
  background-color:transparent;
  z-index: 1;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  top: 50px; /* adjust as needed */
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown input[type=checkbox]:checked ~ .dropdown-content {
  display: block;
  color: white;
}

.name {
	color: white;
  font-weight: bold;
}

/* Hide checkbox */
.dropdown input[type=checkbox] {
  display: none;
}</style>
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
	?><header>
	   <div class="dropdown">
    <input type="checkbox" id="dropdown-toggle">
    <label class="dropbtn" for="dropdown-toggle">
     <img src="data:image/jpeg;base64,<?php echo base64_encode($row ['picture']); ?>" width='200' height='200' >
      <span class="name"><a style="color: red;" ><?php echo $_SESSION["name"] ?></a></span>
    </label>
    <div class="dropdown-content">
      <a href="login.html">Disconnect</a>
	  <a href="edit.php">settings</a>
	  
    </div>
  </div>
		<nav>
			<ul>
				<li><a href="userrec.php">rec list</a></li>
				
				
				
				
				
 


			</ul>
		</nav>


	</header>
  
	<div class="container">
		
		<form action="reclamer.php" method="POST">
		<h1>Complaint</h1>

			<label for="nom">Name :</label>
			<input type="text" id="nom" name="nom" value="<?php echo $row ['nom'];?>"   required>

			<label for="email">Email :</label>
			<input type="email" id="email" name="email" value="<?php echo $row ['gmail'];?>"  required>

			<label for="telephone">phone :</label>
			<input type="tel" id="telephone" name="tel" value="<?php echo $row ['number'];?>"  required>

			<label for="sujet">subject :</label>
			<input type="text" id="sujet" name="sujet" required>

			<label for="message">Message :</label>
			<textarea id="message" name="message" required></textarea>

			<input type="submit" value="Send">
		</form>
	</div>
	<footer>
		<p>&copy; All rights reserved.</p>
	</footer>
	<?php
}
    ?>

</body>
</html>