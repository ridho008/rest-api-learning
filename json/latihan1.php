<?php 
// $mahasiswa = [
//    [
//       "nama" => "Ridho Surya",
//       "nrp" => "23476",
//       "email" => "surya@gmail.com",
//    ],
//    [
//       "nama" => "Surya",
//       "nrp" => "23476",
//       "email" => "surya@gmail.com",
//    ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=UAS_SOP', 'root', '');
$db = $dbh->prepare('SELECT * FROM barang');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
?>