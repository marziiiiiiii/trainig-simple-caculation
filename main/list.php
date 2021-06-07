<html>

<head>

	<title>Modify Student</title>

</head>

<body>
	<!-- -----------------------------------------------------------------------------------PHP -->
	<?php

	include("header.php");
	$con = mysqli_connect("localhost", "root", "", "training");

	// ----------------------------------- students information -----------------------------------

	$query = "SELECT * FROM Students  ";
	$result = mysqli_query($con, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

	echo "<div class='main content'>
		<table>";
	echo "<tr>";
	echo "<td> user </td>";
	echo "<td> pass </td>";
	echo "<td> lvl </td>";
	echo "<td> daily corrects </td>";
	echo "<td> last access </td>";
	echo "<td> corrects </td>";
	echo "<td> wrongs </td>";
	echo "</tr>";
	echo "<tr>
	<td>-------</td>
	<td>-------</td>
	<td>-------</td>
	<td>--------------</td>
	<td>----------------------------</td>
	<td>-------</td>
	<td>-------</td>
	</tr>";
	foreach ($data as $key => $row) {
		echo "<tr>";
		foreach ($row as $key2 => $row2) {
			echo "<td>" . $row2 . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>
	</div>";


	$con->close();



	?>

</body>
<!-- -----------------------------------------------------------------------------------CSS -->
<style>
	.content {
		border: solid 9px #00D1BB;
		padding: 30px;
		border-radius: 20px;
		color: #551A8B;
	}

	td {

		color: #551A8B;
		font-size: 20px;
		font-weight: bold;
		padding: 10px;

	}

	.main {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}
</style>

</html>