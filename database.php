<?php

$host = 'localhost';
$username = "root";
$password = "";
$database = "contacts_app";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " .mysqli_connect_error());
}


// $result = $conn->query("SELECT * FROM contacts");
// $arr = array();
// if ($result -> num_rows > 0) {
//     while($row = mysqli_fetch_assoc ($result)) {
//         foreach ($row as $key => $values){
//             $arr [$key] =$values;
//         }
//     }
// }
// var_dump($arr);
?>
