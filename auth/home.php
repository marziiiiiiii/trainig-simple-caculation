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
		} else {
			echo "<div class='student-home'>
			<h1>student</h1>
			<h2>level felan</h2>
			<form action='test.php' method='POST'>
				<br><input type='submit' class='btn' value='start test'>
			</form>
			</div>";
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

</style>

</html>