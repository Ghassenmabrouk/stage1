<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint</title>
	<link rel="stylesheet" type="text/css" href="res.css">
	
</head>
<body>

      <header>
		<nav>
			<ul>
				
				<li><a href="#" onclick="history.back()">back</a></li>
			</ul>
		</nav>
	</header>
	<div class="container">
		
		<form action="modifrect1.php" method="POST">
	
		<?php
		$b=$_SESSION["name"] ;
	$c=$_POST["num"];
$cnx=mysqli_connect("localhost","root","");
mysqli_select_db($cnx,"foot");
$q="select * from reclamer where num='$c'";

$res=mysqli_query($cnx,$q);
while ($row=mysqli_fetch_assoc($res))
{
	
	?>
		<label for="id">ID :</label>
			<input type="id" id="num" name="num" value="<?php echo $row ['num'];?>"  readonly>
			<label for="nom">Name :</label>
			<input type="text" id="nom" name="nom" value="<?php echo $row ['nom'];?>" readonly  >

			<label for="email">Email :</label>
			<input type="email" id="email" name="email" value="<?php echo $row ['gmail'];?>" >

			<label for="telephone">phone :</label>
			<input type="phone" id="telephone" name="tel" value="<?php echo $row ['phone'];?>"  >

			<label for="sujet">subject :</label>
			<input type="text" id="sujet" name="sujet" value="<?php echo $row ['subject'];?>" >

			<label for="message">Message :</label>
			<textarea id="message" name="message" value="echo ".$row['message']." ></textarea>
           
	<?php echo $row ['num'];?>
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