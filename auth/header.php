<?php

$actual_link = "$_SERVER[REQUEST_URI]";
// echo $actual_link;



if (isset($_COOKIE["signedin"]) && $_COOKIE["signedin"] == '1') {

	echo "<div class='header'>
	<a href='signout.php'>SignOut</a>
	<h4>Welcome " . $_COOKIE["user"] . "</h4>
	</div>";
} else {
	if ($actual_link == '/PHP/training/auth/signin.php') {
		echo "<div class='header'>
		<a class='current' href='../auth/signin.php'>SignIn</a> 
		<a href='../auth/signup.php'>SignUp</a>
		<a href='../auth/home.php'>Home</a>
		</div>";
	} else if ($actual_link == '/PHP/training/auth/signup.php') {
		echo "<div class='header'>
		<a href='../auth/signin.php'>SignIn</a> 
		<a class='current' href='../auth/signup.php'>SignUp</a>
		<a href='../auth/home.php'>Home</a>
		</div>";
	} else {

		echo "<div class='header'>
		<a  href='../auth/signin.php'>SignIn</a> 
		<a href='../auth/signup.php'>SignUp</a>
		<a class='current' href='../auth/home.php'>Home</a>
		</div>";
	}
}
?>
<html>

<style>
	.header {
		display: flex;
		justify-content: space-around;
		align-items: center;
		background-color: #551A8B;
		width: 100%;
		height: 100px;
		font-size: 30px;
		direction: rtl;
margin-bottom: 50px;

	}

	.current{
		color: #00D1BB;
	}

	a:link,
	a:visited,
	a:active {
		/* color: palegreen; */
		text-decoration: none;
		font-weight: bold;

		background-color: white;
		padding: 9px;
		border-radius: 15px;
	}

	a:hover {
		color: #00D1BB;
		text-decoration: none;
	}


	h4 {
		color: white;
	}
</style>

<body>



</body>

</html>