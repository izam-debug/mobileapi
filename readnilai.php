<?php

include 'koneksi.php';
$query = "SELECT * FROM nilai";
$result = $mysqli->query($query)
    or die ($mysqli->error);
    
$response = array();
$posts = array();

while($row=$result->fetch_assoc()) {
    $id = $row['id'];
    $idmurid = $row['idmurid'];
    $idsoal = $row['idsoal'];
    $skor = $row['skor'];
    $jwb_benar = $row['jwb_benar'];
    $posts[] = array(
        'id' => $id,
        'idmurid' => $idmurid,
        'idsoal' => $idsoal,
        'skor' => $skor,
        'jwb_benar' => $jwb_benar);
}

$response = $posts;

$fp = fopen('data-api-nilai.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
header('Location: http://api.izam.cf/mobile/json/data-api-nilai.json');

?>