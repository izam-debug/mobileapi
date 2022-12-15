<?php

include 'koneksi.php';
$query = "SELECT * FROM isisoal";
$result = $mysqli->query($query)
    or die ($mysqli->error);
    
$response = array();
$posts = array();

while($row=$result->fetch_assoc()) {
    $id = $row['id'];
    $idsoal = $row['idsoal'];
    $soal = $row['soal'];
    $jwb_a = $row['jwb_a'];
    $jwb_b = $row['jwb_b'];
    $jwb_c = $row['jwb_c'];
    $jwb_benar = $row['jwb_benar'];
    $posts[] = array(
        'id' => $id,
        'idsoal' => $idsoal,
        'soal' => $soal,
        'jwb_a' => $jwb_a,
        'jwb_b' => $jwb_b,
        'jwb_c' => $jwb_c,
        'jwb_benar' => $jwb_benar);
}

$response = $posts;

$fp = fopen('data-api-isisoal.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
header('Location: http://api.izam.cf/mobile/json/data-api-isisoal.json');

?>