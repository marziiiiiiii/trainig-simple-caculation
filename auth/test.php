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


	//save question

	//correct options
	// check answer




	$user = $_COOKIE["user"];
	$result = mysqli_query($con, "SELECT * FROM Students WHERE user = '" . $user . "' ");

	$lvl = 1;

	while ($row = mysqli_fetch_array($result)) {

		$lvl = $row['lvl'];
	}


	if ($lvl == '1') {
		echo "level 1 question : </br>";
		$id = rand(1, 8);
		// random obj pic
		$sql = "SELECT * FROM objpictures WHERE OPid = $id";
		$result = $con->query($sql);
		$row = mysqli_fetch_array($result);
		if (!$row) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		} else {
			$answer = rand(1, 10);
			for ($i = 1; $i <= $answer; $i++) {
				echo '<img class="fruite" src="data:image/jpeg;base64,' . base64_encode($row['objPic']) . '"/>';
			}
		}
	} else {
		echo "you are not level 1 student ";
		echo $lvl;
	}


	?>
	<br><br>
	<div class='main'>
		<div class='info'>how many fruits do you see?<br>
			<br> <input type="radio" name="option" value="1">
			<label>1</label><br>
			<br> <input type="radio" name="option" value="2">
			<label>2</label><br>
			<br> <input type="radio" name="option" value="3">
			<label>3</label><br>
			<br> <input type="radio" name="option" value="4">
			<label>4</label><br>
			<br><input type="submit" class="btn" name="answer" value="submit">

		</div>

	</div>

</body>

<style>
	.btn {
		color: #00D1BB;
		background-color: white;
		border: none;
		border-radius: 15px;
		padding: 8px;
		cursor: pointer;
		font-weight: bolder;
		font-size: 17px;
	}

	.btn:hover {
		color: #551A8B;
	}

	input {
		margin: 15px;
		font-size: 17px;
	}

	.info {
		background-color: #00D1BB;
		padding: 30px;
		border-radius: 20px;
		color: #551A8B;
		font-size: 18px;
		font-weight: bold;
	}

	.main {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}

	.fruite {
		height: 180px;
		width: 180px;
	}
</style>

</html>