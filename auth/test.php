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





	if (isset($_POST['op'])) {
		$op = $_POST['op'];
		$hiddenAnswer = $_POST['hiddenAnswer'];
		if (!empty($op) && $op == $hiddenAnswer) {
			echo "<div class='res main'>bravo :) </div>";
			// todo add 1 correct to students db

			// $sql = "UPDATE Students SET lastname='Doe' WHERE user=$user";

			// if ($conn->query($sql) === TRUE) {
			//   echo "Record updated successfully";
			// } else {
			//   echo "Error updating record: " . $conn->error;
			// }


		} else {
			echo "<div class='res main'>pay attention :( </div> ";
			// todo add 1 wrong to students db
		}
	} else {
		echo "<div class='res main'>choose the answer </div>";
	}

	$user = $_COOKIE["user"];
	$result = mysqli_query($con, "SELECT * FROM Students WHERE user = '" . $user . "' ");

	$lvl = 1;
	while ($row = mysqli_fetch_array($result)) {

		$lvl = $row['lvl'];
		echo "<div class='info main'> daily corrects : " . $row['dailyCorrects']
		. "<br/> total corrects : " . $row['corrects']
		. "<br/> total wrongs : " . $row['wrongs']
		. "<br/> last access : " . $row['lastAccess'] ."</div>";
	}


	if ($lvl == '1') {
		echo "<div class='title '> level 1 question (1 to 10) :</div> </div>";
		$id = rand(1, 8);
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
			$randomPos = rand(0, 3);
			$option[$randomPos] = $answer;
			for ($i = 0; $i < 4; $i++) {
				if ($i == $randomPos) {
					$i++;
				}
				$randNum = rand(1, 10);
				while (in_array($randNum, $option)) {
					$randNum = rand(1, 10);
				}
				$option[$i] = $randNum;
			}
			// todo save question

		}
	} else {
		echo "you are not level 1 student ";
		echo $lvl;
	}


	?>
	<br><br>
	<div class='main'>
		<div class='question'>how many fruits do you see?<br>
			<form action="test.php" method="post">
				<br> <input type="radio" name="op" value="<?php echo $option[0]; ?>" onclick="checkanswer(value, id)">
				<label><?php echo $option[0]; ?></label><br>
				<br> <input type="radio" name="op" value="<?php echo $option[1]; ?>">
				<label><?php echo $option[1]; ?></label><br>
				<br> <input type="radio" name="op" value="<?php echo $option[2]; ?>">
				<label><?php echo $option[2]; ?></label><br>
				<br> <input type="radio" name="op" value="<?php echo $option[3]; ?>">
				<label><?php echo $option[3]; ?></label><br>
				<br><span class="nxt">next </span> <input type="submit" class="btn" name="hiddenAnswer" value="<?php echo $option[$randomPos]; ?>">
			</form>
		</div>

	</div>

</body>

<style>
	.btn {
		background-color: #00D1BB;
		color: #00D1BB;
		border: none;
		border-radius: 0px 90px 90px 0px;
		/* padding: 8px; */
		cursor: pointer;
		font-weight: bolder;
		font-size: 17px;
		width: 35px;
		height: 48px;
	}

	.btn:hover {
		background-color: #551A8B;
		color: #551A8B;
	}
.info{
	background-color: #00D1BB;
	padding: 20px;
	font-size: 20px;
}
	.res {
		color: #551A8B;
		padding: 10px;
		font-size: 30px;
		font-weight: bold;
	}

	input {
		/* margin: 15px; */
		font-size: 17px;
	}

	.nxt {
		border-radius: 90px 0px 0px 90px;
		border: solid 3px #00D1BB;
		width: 25px;
		padding: 9px;
		height: 50px;
	}

	.question {
		border: solid 9px #00D1BB;
		padding: 30px;
		border-radius: 20px;
		color: #551A8B;
		font-size: 18px;
		font-weight: bold;
		max-width: 30%;
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
	}

	.fruite {
		height: 180px;
		width: 180px;
	}
</style>

</html>