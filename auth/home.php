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
			echo $_COOKIE["as"];
		} else {
			echo "<div class='student-home'>
			<h1>you are a level </h1>
			<h1>start test</h1>
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
		color: hotpink;
	}
</style>

</html>