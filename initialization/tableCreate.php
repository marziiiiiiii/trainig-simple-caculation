<?php
$con = mysqli_connect("localhost", "root", "", "training");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

//---------------------------------------------

// $sql = "CREATE TABLE Teachers
// (
// user varchar(15) NOT NULL , 
// PRIMARY KEY(user),
// pass varchar(15) NOT NULL,
// confirmed boolean 
// )";

//---------------------------------------------

// $sql = "CREATE TABLE Students
// (
// user varchar(15) NOT NULL , 
// PRIMARY KEY(user),
// pass varchar(15) NOT NULL ,
// lvl int NOT NULL ,
// dailyCorrects int ,
// lastAccess DATETIME,
// corrects varchar(15),
// wrongs varchar(15)
// )";

//---------------------------------------------

// $sql = "CREATE TABLE Questions
// (
// Qid int NOT NULL AUTO_INCREMENT , 
// PRIMARY KEY(Qid),
// qustion varchar(15) ,
// objPic BLOB ,
// objsPic BLOB ,
// oprand varchar(5),
// anwser int,
// lvl int 
// )";

//---------------------------------------------

$sql = "CREATE TABLE objPictures
(
OPid int NOT NULL AUTO_INCREMENT , 
PRIMARY KEY(OPid),
objPic BLOB 
)";

////bayad dar phpmyadmin be soorat dasti ax haro insert kard
////ax ha dar folder "picture for insert in db"

//---------------------------------------------

if (mysqli_query($con, $sql)) {
    echo "Table created";
} else {
    echo "Error creating table: " . mysqli_error($con);
}
mysqli_close($con);