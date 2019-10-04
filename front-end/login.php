<!DOCTYPE html>
<html>
<title>Login, Hiragana Tutor</title>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('../web-service/errors.php'); ?>
  	<div class="input-group">
  		<label>username</label>
  		<input type="text" name="username" onclick="this.value=''" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" onclick="this.value=''" >
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
<?php
	    $servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "HiraganaTutor";

		/*This creates connection*/
		$conn=mysqli_connect($servername, $username, $password, $dbname);
		/*This checks connection*/
		if ($conn->connect_error)
		{
		    die("Connection failed: " . $conn->connect_error);
		}
		session_start();
		if(isset($_POST["username"]) )//&& isset($_POST["password"]))
		{
			$user=$_POST["username"];
			$pswrd=$_POST['password'];
		
			$sql = "SELECT * FROM HiraganaQuiz where username='$user'";
			$result = mysqli_query($conn, $sql); //may also use $conn->query($sql)

			if ($result->num_rows ==1) {
			    while($row = $result->fetch_assoc()) {
			    	if($row[Password]=='$pswrd')
			    	{
			    		$_SESSION['id']=$row[ID];
			        	echo "Welcome" . $row["username"]."<br>";
			    	}
			    	else
			    	{
			    		echo "Wrong password, try again.<br>";
			    	}
			    }
			} else {
			    echo "Login failed. Please Try Again.<br>";
			}
	}
		$conn->close();
?>
