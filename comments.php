<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'r6_comments');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die('Connection Failed ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST["userName"];
    $userComment = $_POST["userComment"];
    $query = $conn->prepare("INSERT INTO new_comments (userName, userComment) VALUES (?, ?)");
    
    // Use 'ss' since you have two string parameters
    $query->bind_param('ss', $userName, $userComment);
    
    $query->execute();
    $conn->close();
}
?>