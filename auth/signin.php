<?php
//session_start(); 
?>
<html>

<head>

	<title>SignIn</title>

</head>

<body>

	<?php



	if (isset($_COOKIE["signedin"]) && $_COOKIE["signedin"] == '1')
		header('Location: welcome.php');

	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$as = $_POST['as'];
		if (!empty($user) && !empty($pass)) {

			//check database
			$con = mysqli_connect("localhost", "root", "", "training");
			if (!$con) {
				die(mysqli_connect_errno());
			}


			if ($as == "Sign In as Teacher") {
				$result = mysqli_query($con, "SELECT user, pass FROM Teachers WHERE user = '" . $user . "' AND  pass = '" . $pass . "'");
			} else {
				$result = mysqli_query($con, "SELECT user, pass FROM Students WHERE user = '" . $user . "' AND  pass = '" . $pass . "'");
			}

			$check_user = null;
			$check_pass = null;

			while ($row = mysqli_fetch_array($result)) {
				$check_user = $row['user'];
				$check_pass = $row['pass'];

				echo "user pass is correct.";
			}

			if ($user == $check_user && $pass == $check_pass) {
				echo "Matches.";

				$expire = time() + 60 * 60 * 24 * 7;
				setcookie("user", $user); //, $expire);
				setcookie("signedin", "1"); //, $expire);
				header('Location: welcome.php');

				echo "Cookies have set.";
			} else {
				echo "No match found. Try again.";
			}
		} else {
			echo 'You must enter a username and password.';
		}
	}
	?>

	<form action="signIn.php" method="POST">
		<br>Usrename: <input type="text" name="user">
		<br>Password: <input type="password" name="pass">
		<br><input type="submit" name="as" value="Sign In as Teacher">
		<br><input type="submit" name="as" value="Sign In as Student">
	</form>

	<!-- <form action="welcome.php" method="POST">
		<input type="submit" name="" value="">
	</form> -->


</body>

</html>