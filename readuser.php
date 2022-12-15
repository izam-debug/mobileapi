<?php

include 'koneksi.php';
$query = "SELECT * FROM user";
$result = $mysqli->query($query)
    or die ($mysqli->error);
    
$response = array();
$posts = array();

while($row=$result->fetch_assoc()) {
    $id = $row['id'];
    $email = $row['email'];
    $password = $row['password'];
    $level = $row['level'];
    $posts[] = array(
        'id' => $id,
        'email' => $email,
        'password' => $password,
        'level' => $level);
}

$response = $posts;

$fp = fopen('data-api-user.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
header('Location: http://api.izam.cf/mobile/json/data-api-user.json');

?>