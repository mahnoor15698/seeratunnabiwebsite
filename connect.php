<?php
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];
$text = $_POST['text'];
//database connection
$conn = new mysqli('localhost','root','','contact');
if ($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into information(name, number, email, password, text)
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $number, $email, $password, $text);
    $stmt->execute();
    echo "done successfully...";
    $stmt->close();
    $conn->close();
}
?>