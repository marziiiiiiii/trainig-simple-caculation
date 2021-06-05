<?php
// $sign = $_POST['sign'];

// if ($sign == "sign in"){
// 	header('Location: signin.php');

// }else{
// 	header('Location: signup.php');

// }

if (isset($_COOKIE["signedin"]) && $_COOKIE["signedin"] == '1') {

	echo "<div class='sign'>
	<a href='signout.php'>SignOut</a>
	<h4>Welcome " . $_COOKIE["user"] . "</h4>
	</div>";
} else {
	echo "<div class='sign'>
	<a  href='../auth/signin.php'>SignIn</a> 
	<a href='../auth/signup.php'>SignUp</a>
	<a href='../auth/home.php'>Home</a>
	</div>";
}
?>
<html>

<style>
	.sign {
		display: flex;
		justify-content: space-around;
		align-items: center;
		background-color: palegreen;
		width: 100%;
		height: 80px;
		font-size: 30px;
		direction: rtl;

	}


	a:link,
	a:visited,
	a:active {
		color: palegreen;
		text-decoration: none;
		font-weight: bold;

		background-color: white;
		padding: 9px;
		border-radius: 15px;
	}

	a:hover {
		color: hotpink;
		text-decoration: none;
	}


	h4 {
		color: hotpink;
	}
</style>

<body>



</body>

</html>