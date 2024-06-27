<?php

// connecting to the database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chat_app";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// inserting values into the database
$username = $_POST['username'];
$message = $_POST['message'];

// inserting values
$sql = "insert into messages (username, message) values ('$username', '$message')";

// executing the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();