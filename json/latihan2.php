<?php 
$data = file_get_contents('coba.json');
$mahasiswa = json_decode($data, true);
var_dump($mahasiswa);
echo "<br>";
// echo $mahasiswa[0]["nama"];

foreach ($mahasiswa[0] as $key => $value) {
   echo "<br>";
   echo $value["nama"];
}
?>