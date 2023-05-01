<!DOCTYPE html>

<?php
		session_start();?>
		<html>
<head>
	
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			color: #333;
			text-align: center;
		}

		table {
			border-collapse: collapse;
			margin: 0 auto;
			background-color: #fff;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		th, td {
			padding: 12px 15px;
			text-align: center;
			border: 1px solid #ddd;
		}

		th {
			background-color: #333;
			color: #fff;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #ddd;
		}

		.ban-btn {
			background-color: #ff0000;
			color: #fff;
			padding: 6px 12px;
			border: none;
			cursor: pointer;
			border-radius: 4px;
		}
			.Unban-btn {
			background-color: green;
			color: #fff;
			padding: 6px 12px;
			border: none;
			cursor: pointer;
			border-radius: 4px;
		}
header {
	background-color: grey;
	padding: 10px;
	text-align: center;
	 display: flex;
  justify-content: space-between;
  align-items: center;
  transition: transform 0.3s ease-in-out;
 top -50px;
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
	font-size: 18px;
	font-weight: bold;
	transition: color 0.3s ease-in-out;
}

nav a:hover {
	color: white;
}

h1 {
	margin-top: 50px;
	font-size: 42px;
}
.button {
	display: inline-block;
	background-color: #333;
	color: #fff;
	padding: 10px 20px;
	border-radius: 5px;
	text-decoration: none;
	transition: background-color 0.3s ease-in-out;
}

.button:hover {
	background-color: #666;
}


footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
 
  bottom: 0;
  width: 100%;
  height: 70px;
}


.dropdown {
  position: relative;
}

.dropbtn {
  background-color: grey;
  color: black;
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
  display: none;
  position: absolute;
  background-color: transparnt;
  z-index: 1;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  top: 50px; /* adjust as needed */
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown input[type=checkbox]:checked ~ .dropdown-content {
  display: block;
}

.name {
  font-weight: bold;
}

/* Hide checkbox */
.dropdown input[type=checkbox] {
  display: none;
}
a {
	color: white;
	text-decoration: none;
}

a:hover {
	color: #666;
}
img {
  vertical-align: middle;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
  
}

	</style>
	<script> 
    function 
	hidePassword() {
        document.getElementById("pass").type = "password";
    }
    document.getElementById("f").addEventListener("submit", hidePassword);
</script>
	<title>Users List</title>
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
				<li><a href="#" onclick="history.back()">back</a>
				<li><a href="res.php">ListREC</a></li>
			</ul>
		</nav>


	</header>
<h1> Users List </h1>
		<?php
		$cnx=mysqli_connect("localhost" ,"root","");
		mysqli_select_db($cnx,"foot");

	
		if (isset($_POST['ban_nom']) && isset($_POST['ban_pass'])) {
			
			
			$_SESSION['ban_nom'] = $_POST['ban_nom'];
			$_SESSION['ban_pass'] = $_POST['ban_pass'];
		}

		$sql = "SELECT * FROM register";
		$result = mysqli_query($cnx, $sql);
		echo "<table border='1'>
				<tr>
					<th>Nom</th>
					<th>Gmail</th>
					<th>Country</th>
					<th>Number</th>
					<th>Gender</th>
					<th>Password</th>
					<th>Picture</th>
					<th>Ban</th>
				</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['nom']."</td>";
			echo "<td>".$row['gmail']."</td>";
			echo "<td>".$row['country']."</td>";
			echo "<td>".$row['number']."</td>";
			echo "<td>".$row['gender']."</td>";
			echo "<td>".$row['pass']."</td>";
			echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' width='80' height='80'></td>";
		
			echo "<td>
					<form method='POST' id='f' action='ban1.php' enctype='multipart/form-data'>
						<input type='hidden' name='ban_nom' value='".$row['nom']."'>";





						echo " <button type='submit' class='ban-btn'>Ban</button>
					</form>
				</td>";
			echo "</tr>";
		}
		echo "</table>";
		?><h1> banned list </h1><?php
	?>
		<?php
		$cnx=mysqli_connect("localhost" ,"root","");
		mysqli_select_db($cnx,"foot");

	
		if (isset($_POST['ban_nom']) && isset($_POST['ban_pass'])) {
			
			session_start();
			$_SESSION['ban_nom'] = $_POST['ban_nom'];
			$_SESSION['ban_pass'] = $_POST['ban_pass'];
		}

		$sql = "SELECT * FROM ban";
		$result = mysqli_query($cnx, $sql);
		echo "<table border='1'>
				<tr>
					<th>Nom</th>
					<th>Gmail</th>
					<th>Country</th>
					<th>Number</th>
					<th>Gender</th>
					<th>Password</th>
					<th>Picture</th>
					<th>UnBan</th>
				</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['nom']."</td>";
			echo "<td>".$row['gmail']."</td>";
			echo "<td>".$row['country']."</td>";
			echo "<td>".$row['number']."</td>";
			echo "<td>".$row['gender']."</td>";
			echo "<td>".$row['pass']."</td>";
			echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' width='80' height='80'></td>";
			
			echo "<td>
					<form method='POST' action='unban.php' enctype='multipart/form-data'>
						<input type='hidden' name='ban_nom' value='".$row['nom']."'>
					
						<button type='submit' class='Unban-btn'>UnBan</button>
					</form>
				</td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
		 <?php

}

    ?>
	<footer>
		<p>&copy; All rights reserved.</p>
		<img src="fb.png" alt="Facebook Icon" />
		<img src="insta.jpg" alt="insta Icon" />
		<img src="twi.png" alt="twi Icon" />
	</footer>
</body>
</html>
