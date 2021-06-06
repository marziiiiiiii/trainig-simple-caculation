<?php
//session_start(); 
?>
<html>

<head>

	<title>test</title>

</head>

<body>

	<?php

	include("header.php");
	$con = mysqli_connect("localhost", "root", "", "training");

	function generateLvl1Q()
	{
		//save question

		// view

		// check answer
	}



	$user = $_COOKIE["user"];
	$result = mysqli_query($con, "SELECT * FROM Students WHERE user = '" . $user . "' ");

	$lvl = 1;

	while ($row = mysqli_fetch_array($result)) {

		$lvl = $row['lvl'];
	}


	if ($lvl == '1') {
		echo "level 1 question : </br>";
		$id = 1;
		// random obj pic
		$sql = "SELECT * FROM objpictures WHERE OPid = $id";
		$result = $con->query($sql);
		$row = mysqli_fetch_array($result);
		if (!$row) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}else{
			echo '<img src="data:image/jpeg;base64,' . base64_encode($row['objPic']) . '"/>';
			echo '<img src="data:image/jpeg;base64,' . base64_encode($row['objPic']) . '"/>';

		}
	} else {
		echo "you are not level 1 student ";
		echo $lvl;
	}


	?>
	<div class='main'>
		<!-- <form action="signIn.php" method="POST">
			<br>
			<div class='info'>Usrename: <input type="text" name="user">
				<br>Password: <input type="password" name="pass">
			</div>
			<br><input type="submit" class="btn" name="as" value="Sign In as Teacher">
			<br><input type="submit" class="btn" name="as" value="Sign In as Student">
		</form> -->

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
	.btn:hover{
		background-color: #551A8B;
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