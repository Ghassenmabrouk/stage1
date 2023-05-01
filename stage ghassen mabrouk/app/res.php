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

		.del {
			background-color: #ff0000;
			color: #fff;
			padding: 6px 12px;
			border: none;
			cursor: pointer;
			border-radius: 4px;
		}
			.take {
			background-color: green;
			color: #fff;
			padding: 6px 12px;
			border: none;
			cursor: pointer;
			border-radius: 4px;
		}
		.my-message {
  color: red;
  font-weight: bold;
}
header {
	background-color: #f2f2f2;
	padding: 20px;
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
	font-size: 18px;
	font-weight: bold;
	transition: color 0.3s ease-in-out;
}

nav a:hover {
	color: #666;
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
  
  bottom: auto;
  width: 100%;
  height:auto;
}


.dropdown {
  position: relative;
}

.dropbtn {
  background-color: white;
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
  background-color: white;
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
	color: #333;
	text-decoration: none;
}

a:hover {
	color: #666;
}
	</style>


	<title>Complaint List</title>
	<script>
	

		function checkResponsible(responsible) {
			var sessionResponsible = "<?php echo $_SESSION['name']; ?>";
			if (responsible !== sessionResponsible && responsible !== '') {
				alert("You are not responsible for this complaint.");
				
				return false;
			}
			return true;
		}
	</script>
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
				<li><a href="userslist">Users</a></li>
				
			</ul>
		</nav>


	</header>
	
	<h1>Complaint List</h1>
	
	
	
	
	<?php
		
		$a = $_SESSION["name"];
		$cnx = mysqli_connect("localhost", "root", "");
		mysqli_select_db($cnx, "foot");

		$sql = "SELECT * FROM reclamer";
		$result = mysqli_query($cnx, $sql);

		echo "<table border='1'>
				<tr>
					<th>ID</th>
					<th>Nom</th>
					<th>Gmail</th>
					<th>Phone</th>
					<th>Subject</th>
					<th>Message</th>
					<th style='background-color: purple;'>Comment</th>
					<th style='background-color:blue;'>Stats</th>
					<th style='background-color: cyan;'>Responsible</th>
					<th style='background-color: green;'>Action</th>
					<th style='background-color: red;'>Action</th>
				</tr>";

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['num']."</td>";
			echo "<td>".$row['nom']."</td>";
			echo "<td>".$row['gmail']."</td>";
			echo "<td>".$row['phone']."</td>";
			echo "<td>".$row['subject']."</td>";
			echo "<td>".$row['message']."</td>";
			echo "<td >".$row['comment']."</td>";
			echo "<td>".$row['stats']."</td>";
			echo "<td>".$row['res']."</td>";
			echo "<td>";
			echo "<form method='POST' action='res1.php' onsubmit='return checkResponsible(\"".$row['res']."\");'>";
			echo "<input type='hidden' name='num' value='".$row['num']."'>";
			echo "<input type='hidden' name='nom' value='".$row['nom']."'>";
			echo "<input type='hidden' name='gmail' value='".$row['gmail']."'>";
			echo "<input type='hidden' name='phone' value='".$row['phone']."'>";
			echo "<input type='hidden' name='subject' value='".$row['subject']."'>";
			echo "<input type='hidden' name='message' value='".$row['message']."'>";
			echo "<input type='hidden' name='stats'  >";
			echo "<input type='hidden' name='responsible' value='$a' >";
			echo "<button type='submit' class='take'>>Take it</button>";
			echo "</form>";
			echo "</td>";
			echo "<td>";
			echo "<form method='POST' action='delrec.php' onsubmit='return checkResponsible(\"".$row['res']."\");'>";
			echo "<input type='hidden' name='num' value='".$row['num']."'>";
			echo "<input type='hidden' name='nom' value='".$row['nom']."'>";
			echo "<input type='hidden' name='gmail' value='".$row['gmail']."'>";
			echo "<input type='hidden' name='phone' value='".$row['phone']."'>";
			echo "<input type='hidden' name='subject' value='".$row['subject']."'>";
			echo "<input type='hidden' name='message' value='".$row['message']."'>";
			echo "<input type='hidden' name='stats'  >";
			echo "<input type='hidden' name='responsible' value='$a' >";
			echo "<button type='submit' class='del'>>Delete it</button>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";

		mysqli_close($cnx);
	?>
	 <?php

}

    ?>
	<footer>
		<p>&copy; All rights reserved.</p>
	</footer>
</body>
</html>
