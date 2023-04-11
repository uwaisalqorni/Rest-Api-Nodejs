<?php
require_once 'connection.php';

$query = "SELECT * FROM data_nama";
$result = mysqli_query($con, $query);
$response = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($response, array(
        "id" => $row[0],
        "nama" => $row[1]
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);
?>