<html>

<head>

	<title>Home Page</title>

</head>

<body>

	<?php
	include("header.php");
	if (isset($_COOKIE["signedin"]) && $_COOKIE["signedin"] == '1') {
		if ($_COOKIE["as"] == 'Sign In as Teacher') {
			echo "<h1>teacher</h1>";
			echo "<form action='list.php' method='POST'>
				<br><input type='submit' class='btn' value='list of Students'>
			</form>
			<form action='Modify.php' method='POST'>
				<br><input type='submit' class='btn' value='Modify Students'>
			</form>";
		} else {

			$con = mysqli_connect("localhost", "root", "", "training");
			$user = $_COOKIE["user"];
			$result = mysqli_query($con, "SELECT * FROM Students WHERE user = '" . $user . "' ");

			$lvl = 1;
			while ($row = mysqli_fetch_array($result)) {

				$lvl = $row['lvl'];
			}
			if ($lvl < 3) {
				echo "<div class='student-home'>
				<h1>student</h1>
				<h4>level " . $lvl . "</h4>
				<form action='level" . $lvl . ".php' method='POST'>
					<br><input type='submit' class='btn' value='start test'>
				</form>
				</div>";
			}else{
				echo "<div class='student-home'>
				<h1>your level is undefined for this site</h1>
				</div>";
			}
		}
	} else {
		echo "<h1>This is a place for kids who are new to math</h1>";
	}


	?>


</body>

<style>
	.student-home {

		display: flex;
		flex-direction: column;
		justify-content: space-around;
		align-items: center;

	}

	h1 {
		color: #00D1BB;
	}
	h4 {
		color: #551A8B;
	}

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

	.btn:hover {
		background-color: #551A8B;
	}
</style>

</html>