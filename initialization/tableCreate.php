<?php
$con = mysqli_connect("localhost", "root", "", "training");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}


// $sql = "CREATE TABLE Teachers
// (
// user varchar(15) NOT NULL , 
// PRIMARY KEY(user),
// pass varchar(15) NOT NULL,
// confirmed boolean 
// )";



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




$sql = "CREATE TABLE Questions
(
Qid int NOT NULL AUTO_INCREMENT , 
PRIMARY KEY(Qid),
qustion varchar(15) ,
objPic BLOB ,
objsPic BLOB ,
oprand varchar(5),
anwser int,
lvl int 
)";


mysqli_query($con, $sql);


