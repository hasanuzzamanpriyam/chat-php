<?php

// connecting to the database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chat_app";

// connecting to the database
$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// fetching values
$sql = "select * from messages order by timestamp desc";
$result = $conn->query($sql);

// $messages = $result->fetch_all(MYSQLI_ASSOC);
$messages = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
$conn->close();
// encoding array to json
echo json_encode($messages);