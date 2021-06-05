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
			<button>start test</button>
			</div>";
		}
		// echo "<a href='signout.php'>SignOut</a>";
	} else {
		echo "<h1>This is a place for kids who are new to math</h1>";
	}


	?>


</body>

<style>
	.student-home {

		display: flex;
		justify-content: space-around;
		align-items: center;

	}
	h1{
		color: #00D1BB;
	}
</style>

</html>