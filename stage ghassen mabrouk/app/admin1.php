<?php 
session_start();
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <style>
      /* Style the page */
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
      }
      .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      h1 {
        text-align: center;
        margin-top: 20px;
      }
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 30px;
      }
      label {
        display: block;
        font-weight: bold;
        margin-top: 20px;
      }
      input[type="text"],
      input[type="email"],
      input[type="tel"],
	  input[type="country"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-top: 5px;
        margin-bottom: 20px;
        box-sizing: border-box;
      }
      select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-top: 5px;
        margin-bottom: 20px;
        box-sizing: border-box;
      }
      button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
      }
      button[type="submit"]:hover {
        background-color: #3e8e41;
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
footer {
	background-color: #333;
	color: #fff;
	padding: 20px;
	text-align: center;
    bottom: 0px;
	
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
    </style>
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
      <span class="name"><a><?php echo $_SESSION["name"]; ?></a></span>
    </label>
    <div class="dropdown-content">
      <a href="login.html">Disconnect</a>
	  <a href="edit.php">Settings</a>
	  <a href="try.html">home</a>
    </div>
  </div>
		<nav>
			<ul>
		<li><a href="#" onclick="history.back()">home</a></li>
				
			</ul>
		</nav>


	</header>
    <div class="container">
      <h1>ADD Admin</h1>
      <form method="POST" action="admin.php" enctype="multipart/form-data">
	  

	
        <label for="profile-pic">Profile Picture</label>
        <input type="file" id="profile-pic" name="pic" value="def.jpg" required >
        
        <label for="name">Name</label>
        <input type="text" id="name" name="name"  required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="default_email@example.com"  required>
        
        <label for="country">country:</label>
        <input type="country" id="country" name="country"  required>
        
        
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="number"  required>
        
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="">--Select--</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
         
        </select>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
		<input type="checkbox" id="show-password" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'">
<label for="show-password">Show Password</label>

        <?php
}
    ?>
        <button type="submit">Save Changes</button>
      </form>
    </div>
	<footer>
		<p>&copy; All rights reserved.</p>
	</footer>
  </body>
</html>
