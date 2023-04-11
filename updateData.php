<?php
require_once 'connection.php';

if ($con) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $getData = "SELECT * FROM data_nama WHERE id = '$id'";

    if ($nama != "") {
        $result = mysqli_query($con, $getData);
        $rows = mysqli_num_rows($result);
        $response = array();

        if ($rows > 0) {
            $update = "UPDATE data_nama SET nama = '$nama' WHERE id = '$id'";
            $exequery = mysqli_query($con, $update);

            if ($exequery) {
                array_push($response, array(
                    'status' => 'OK'
                ));
            } else {
                array_push($response, array(
                    'status' => 'FAILED'
                ));
            }
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }
} else {
    array_push($response, array(
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);
?>