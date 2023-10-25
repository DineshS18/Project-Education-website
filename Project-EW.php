<?php
session_start();
if (isset($_SESSION["user"])) {
	header("Location: main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="style4.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins',sans-serif;
}
		body{
			display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background-image: linear-gradient(rgba(0, 0, 50, 0.8),rgba(0, 0, 50, 0.8)),url(home.jpeg);
	background-position: center;
	background-size: cover;
	position: relative;
	padding:50px;
}
.container{
	max-width: 600px;
	margin:0 auto;
	padding: 50px;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.form-group{
	margin-bottom: 30px;
}
.container
{
	position: relative;
	width: 450px;
	height: 430px;
	background: #1c1c1c;
	border-radius: 10px;
	overflow: hidden;
}
.container p{
	color: #fff;
}
.container form h2{
	text-align: center;
	color: #fff;
}
</style>
</head>
<body>
	<div class="container">
		<?php
		if(isset($_POST["login"])) {
			$Email = $_POST["Email"];
			$Password = $_POST["Password"];
			require_once "database.php";
			$sql = "SELECT * FROM user WHERE Email = '$Email'";
			$result = mysqli_query($conn, $sql);
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if ($user) {
				if (Password_verify($Password, $user["Password"])) {
					session_start();
					$_SESSION["user"] = "yes";
					header("Location: main.php");
					die();
				}else{
					echo "<div class='alert alert-danger'>Password does not match</div>";
				}
			}else{
				echo "<div class='alert alert-danger'>Email does not match</div>";
			}
		}
		?>
		<form action="login.php" method="post">
			<h2>Login</h2>
			<div class="form-group">
				<input type="Email" placeholder="Enter Email:" name="Email" class="form-control">
			</div>
			<div  class="form-group">
				<input type="Password" placeholder="Enter Password:" name="Password" class="form-control">
			</div>
			<div class="form-btn">
				<input type="submit" value="Login" name="login" class="btn btn-primary">
			</div>
		</form>
		<br>
		<div><p>Not Register Yet: <a href="register.php">Register Here</a></p></div>
	</div>
</body>
</html>
mainpage:
<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="shortcut icon" type="x-icon" href="icon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="mainstyle.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header id="header">
    <div class ="logo"><a href="#"><img src="icon.png"></a>
    </div>
  <ul class="navigation">
      <li><a href="cintro.php">C</a></li>
      <li><a href="c++intro.php">C++</a></li>
      <li><a href="javaintro.php">Java</a></li>
      <li><a href="pythonintro.php">Python</a></li>
      <li><a href="htmlintro.php">HTML</a></li>
    </ul>
    <ul>
      <li><a href="Logout.php">Logout</a></li>
    </ul>
  </header>
  <div class="container">
      <form action="main.php" method="post">
        <div class="intro">
          <h2>Learn to Code</h2><br><br>
        </div>
          <p>Welcome to our educational website for code learners! Our Website is dedicated to providing you with comprehensive resources and tools to help you learn codind and programming languages. Whether you are a beginner just starting out our platform has everything you need to achieve your coding goals. Here, our webiste providing to learn coding with understandable Comment lines as well as Audio and Video for our user in this online platform. 
          </p>
      </form><br>
    </div>
</body>
</html>
css:
@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap');
@import url('https://fonts.googleapis.com/css?family=Rancho&display=swap');
*

{
	margin:0;
	padding:0;
	box-sizing: border-box;
	font-family: 'Poppins',sans-serif;
}
body
{
	overflow-x: hidden;
	background: #fff;
	min-height: 100vh;
}
#header
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	padding: 30px 70px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
#header .logo
{
	color: #094b65;
	font-weight: 700;
	font-size: 2em;
	text-decoration: none;
}
#header ul
{
	padding 30px 70px;
	display: flex;
	justify-content: center;
	align-items: center;
}
#header ul li
{
	list-style: none;
	margin-left: 20px;
}
#header ul li a
{
	text-decoration: none;
	padding: 6px 15px;
	color: #094b65;
	border-radius: 20px;
}
#header ul li a:hover,
#header ul li a.active
{
	background: #094b65;
	color: #fff;
}
.navigation
{
	position: relative;
	display: flex;
	top: 12px;
	left: 400px;
	justify-content: center;
	align-items: center;
	gap: 10px;
}
.navigation li
{
	list-style: none;
}
.navigation li a
{
	text-decoration: none;
	padding: 6px 15px;
	color: #112434;
	border-radius: 20px;
}
.navigation li a:hover,
.navigation li a.active
{
	background: #112434;
	color: #fff;
}
section
{
	position: relative;
	width: 100%;
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
}
section::before
{
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 100px;
	background: linear-gradient(to top, #094b65,transparent);
	z-index: 10;
}
section img
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	pointer-events: none;
}
section #text
{
	position: absolute;
	color: #094b65;
	font-size: 10vw;
	text-align: center;
	line-height: 0.60em;
	font-family: 'Rancho',cursive;
	transform: translateY(-50%);
}
section #text span
{
	font-size: 0.20em;
	letter-spacing: 2px;
	font-weight: 400;
	font-family: 'Rancho',cursive;
}
#btn
{
	text-decoration: none;
	display: inline-block;
	padding: 8px 30px;
	background: #fff;
	color: #094b65;
	font-size:1.2em;
	font-weight: 500;
	letter-spacing: 2px;
	border-radius: 40px;
	transform: translateY(100px);
}
.sec
{
	position: relative;
	padding: 100px;
	background: #094b65;
}
.sec h2
{
	font-size: 3.5em;
	color: #fff;
	margin-bottom: 20px;
}
.sec p
{
	font-size: 1em;
	color: #fff;
}
register:
<?php
session_start();
if (isset($_SESSION["user"])) {
	header("Location: main.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equip="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="style4.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins',sans-serif;
}
		body{
			display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background-image: linear-gradient(rgba(0, 0, 50, 0.8),rgba(0, 0, 50, 0.8)),url(home.jpeg);
	background-position: center;
	background-size: cover;
	position: relative;
	padding:50px;
}
.container{
	max-width: 600px;
	margin:0 auto;
	padding: 50px;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.form-group{
	margin-bottom: 30px;
}
.container
{
	position: relative;
	width: 500px;
	height: 780px;
	background: #1c1c1c;
	border-radius: 10px;
	overflow: hidden;
}
.container p{
	color: #fff;
}
.container form h2{
	text-align: center;
	color: #fff;
}
	</style>
}
</head>
<body>
	<div class="container">
		<?php
		if (isset($_POST["submit"])) {
			$Name = $_POST["Name"];
			$Age = $_POST["Age"];
			$MobileNo = $_POST["MobileNo"];
			$Email = $_POST["Email"];
			$Password = $_POST["Password"];
			$PasswordHash = password_hash($Password, PASSWORD_DEFAULT);
			$errors = array();
			if (empty($Name) OR empty($Age) OR empty($MobileNo) OR empty($Email) OR empty($Password)) {
				array_push($errors,"All fields are required");
			}
			if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
				array_push($errors,"Email is not valid");
			}
			if(strlen($Password)<6){
				array_push($errors,"Password must be atleast 6 characters long");
			}
			require_once "database.php";
			$sql = "SELECT * FROM user WHERE Email = '$Email'";
			$result = mysqli_query($conn, $sql);
			$rowCount = mysqli_num_rows($result);
			if($rowCount>0)
			{
				array_push($errors,"Email already registered");
			}
			if (count($errors)>0){
				foreach ($errors as $error) {
					echo "<div class='alert alert-danger'>$error</div>";
				}
			}else {
				require_once "database.php";
				$sql = "INSERT INTO user (Name, Age, MobileNo, Email, Password) VALUES ( ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				$prepareStmt = mysqli_stmt_prepare($stmt,$sql);
				if($prepareStmt) {
					mysqli_stmt_bind_param($stmt,"sssss",$Name,$Age,$MobileNo,$Email,$PasswordHash);
					mysqli_stmt_execute($stmt);
					echo "<div class='alert alert-success'>You are register successfully.</div>";
				}else {
					die("Somthing went wrong");
				}
			}
		}
		?>
		<form action="register.php" method="post">
			<h2>Register</h2>
			<div class="form-group">
				<input type="text" class="form-control" name="Name" placeholder="Name:">
			</div>
			<div class="form-group">
				<input type="number" class="form-control" name="Age" placeholder="Age:">
			</div>
			<div class="form-group">
				<input type="tel" class="form-control" name="MobileNo" pattern="[0-9]{10}" placeholder="MobileNo:">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="Email" placeholder="Email:">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="Password" placeholder="Password:">
			</div>
			<div class="form-btn">
				<input type="submit" class="btn btn-primary" value="Register" name="submit">
			</div>
		</form>
		<br>
		<div><p>Already Registered: <a href="login.php">Login Here</a></p></div>
	</div>
</body>
</html>
logout:
<?php
session_start();
session_destroy();
header("Location: login.php");
?>