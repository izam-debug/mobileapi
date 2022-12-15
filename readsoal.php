<?php

include 'koneksi.php';
$query = "SELECT * FROM soal";
$result = $mysqli->query($query)
    or die ($mysqli->error);
    
$response = array();
$posts = array();

while($row=$result->fetch_assoc()) {
    $id = $row['id'];
    $idguru = $row['idguru'];
    $nama = $row['nama'];
    $posts[] = array(
        'id' => $id,
        'idguru' => $idguru,
        'nama' => $nama);
}

$response = $posts;

$fp = fopen('data-api-soal.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
header('Location: http://api.izam.cf/mobile/json/data-api-soal.json');

?>