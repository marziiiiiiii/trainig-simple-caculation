<?php
//session_start(); 
?>
<html>

<head>

	<title>SignUp</title>

</head>

<body>

	<?php
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
				setcookie("signedin", "1"); //, $expire);
				// header('Location: ../home/home.php');

				echo "Cookies have set.";

				header('Location: ../home/home.php');
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}

			mysqli_close($con);
		} else {
			echo 'You must enter a username and password.';
		}
	}
	?>

	<form action="signUp.php" method="POST">
		<br>Usrename: <input type="text" name="user">
		<br>Password: <input type="password" name="pass">

		<br> <input type="radio" name="as" value="teacher">
		<label for="teacher">Teacher</label><br>
		<br> <input type="radio" name="as" value="student">
		<label for="student">Student</label><br>

		<br><input type="submit" value="Sign Up">
	</form>


</body>

</html>