<?php
//session_start(); 
?>
<html>

<head>

	<title>SignUp</title>

</head>

<body>

	<?php
	include("header.php");


	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$as = $_POST['as'];
		$confirmed = 0;
		if (!empty($user) && !empty($pass) && !empty($as)) {

			//check database
			$con = mysqli_connect("localhost", "root", "", "training");
			if (!$con) {
				die(mysqli_connect_errno());
			}
			echo "as: " . $as . "<br>";

			if ($as == "teacher") {
				$sql = "INSERT INTO Teachers (user, pass, confirmed)
				VALUES ('" . $user . "', '" . $pass . "', '" . $confirmed . "')";
			} else {
				$sql = "INSERT INTO Students (user, pass, lvl, dailyCorrects, lastAccess, corrects, wrongs)
				VALUES ('" . $user . "', '" . $pass . "' , '1', '0', STR_TO_DATE('15/01/2017 10:10:15','%d/%m/%Y %H:%i:%s'), '', '')";
			}

			if (mysqli_query($con, $sql)) {
				echo "New record created successfully";
				$expire = time() + 60 * 60 * 24 * 7;
				setcookie("user", $user); //, $expire);
				setcookie("as", $as); //, $expire);
				setcookie("signedin", "1"); //, $expire);

				echo "Cookies have set.";

				header('Location: home.php');
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}

			mysqli_close($con);
		} else {
			echo 'You must enter a username and password.';
		}
	}
	?>
	<div class='main'>
		<form action="signUp.php" method="POST">
			<br>
			<div class='info'>Usrename: <input type="text" name="user">
				<br>Password: <input type="password" name="pass">
			

			<br> <input type="radio" name="as" value="teacher">
			<label for="teacher">Teacher</label><br>
			<br> <input type="radio" name="as" value="student">
			<label for="student">Student</label><br>
			</div>
			<br><input class="btn" type="submit" value="Sign Up">
		</form>
	</div>
</body>
<style>
	.btn {
		background-color: #00D1BB;
		color: white;
		border: none;
		border-radius: 15px;
		padding: 13px;
		cursor: pointer;
		font-weight: bolder;
		font-size: 23px;
	}

	input {
		margin: 15px;
		font-size: 17px;
	}

	.info {
		color: #551A8B;
		font-size: 18px;
		font-weight: bold;
	}

	.main {

		display: flex;
		justify-content: space-around;
		align-items: center;
	}
</style>

</html>