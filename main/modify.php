<html>

<head>

	<title>modify students</title>

</head>

<body>
	<!-- -----------------------------------------------------------------------------------PHP -->
	<?php

	include("header.php");
	$con = mysqli_connect("localhost", "root", "", "training");

	// ----------------------------------- user information -----------------------------------
	if (isset($_POST['modify'])) {
		$modify = $_POST['modify'];
		$user = $_POST['user'];
		if (isset($_POST['pass']) && isset($_POST['lvl'])) {
			$pass = $_POST['pass'];
			$lvl = $_POST['lvl'];
		}
		if (isset($_POST['newPass']) && isset($_POST['newLvl'])) {
			$newPass = $_POST['newPass'];
			$newLvl = $_POST['newLvl'];
		}
		echo "<div class='res'>";
		if ($modify == 'ADD Student' && !empty($user) && !empty($pass) && !empty($lvl)) {

			$sql = "INSERT INTO Students (user, pass, lvl, dailyCorrects, lastAccess, corrects, wrongs)
				VALUES ('" . $user . "', '" . $pass . "' , '" . $lvl . "', '0', now(), '0', '0')";

			if (mysqli_query($con, $sql)) {
				echo " sutudent " . $user . " added successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		} else if ($modify == 'EDIT Student' && !empty($user) && !empty($newPass) && !empty($newLvl)) {

			$sql = "UPDATE Students SET pass='" . $newPass . "' , lvl='" . $newLvl . "'   WHERE user='" . $user . "'";
			if (mysqli_query($con, $sql)) {
				echo " sutudent " . $user . " updated successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		} else if ($modify == 'DELET Student' && !empty($user)) {
			$sql = "DELETE FROM Students WHERE user='" . $user . "'";

			if ($con->query($sql) === TRUE) {
				echo "student " . $user . " deleted successfully";
			} else {
				echo "Error deleting record: " . $conn->error;
			}
		} else {
			echo "fill the requirement";
		}
		echo "</div>";

	}



	$con->close();


	?>

	<!-- -----------------------------------------------------------------------------------HTML -->
	<br><br>
	<div class='title'>midify students : fill the reqired fields<br></div>
	<div class='main'>

		<div class='question'>
			<form action="modify.php" method="POST">
				<br>
				<div class='info'>
					Usrename: <input type="text" name="user">
					password: <input type="text" name="pass">
					level: <input type="text" name="lvl">
				</div>
				<br><input type="submit" class="btn" name="modify" value="ADD Student">
			</form>
		</div>
		<div class='question'>
			<form action="modify.php" method="POST">
				<br>
				<div class='info'>
					Usrename: <input type="text" name="user">
					new password: <input type="text" name="newPass">
					new level: <input type="text" name="newLvl">
				</div>
				<br><input type="submit" class="btn" name="modify" value="EDIT Student">
			</form>
		</div>

		<div class='question'>
			<form action="modify.php" method="POST">
				<br>
				<div class='info'>
					Usrename: <input type="text" name="user">
				</div>
				<br><input type="submit" class="btn" name="modify" value="DELET Student">
			</form>
		</div>

	</div>

</body>
<!-- -----------------------------------------------------------------------------------CSS -->
<style>
	.btn {
		background-color: #551A8B;
		color: white;
		border: none;
		border-radius: 20px;
		cursor: pointer;
		font-weight: bolder;
		font-size: 17px;
		padding: 10px;
	}


	.info {
		background-color: #00D1BB;
		padding: 20px;
		font-size: 20px;
		display: flex;
		flex-direction: column;
		width: 250px;
	}

	.res {
		background-color: #00D1BB;
		padding: 10px;
		font-size: 20px;
		font-weight: bold;
	}


	.question {
		/* border: solid 9px #00D1BB; */
		padding: 30px;
		border-radius: 20px;
		color: #551A8B;
		font-size: 18px;
		font-weight: bold;
	}

	.title {

		color: #551A8B;
		font-size: 20px;
		font-weight: bold;

	}

	.main {
		display: flex;
		justify-content: space-around;
		align-items: center;
		flex-wrap: wrap;
	}
</style>

</html>