<?php
include_once 'db/db_connection.php';
$sql = "Select * from diseases";
$diseases = array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $disease['name'] = $row['name'];
        $disease['cause'] = $row['cause'];
        $disease['status'] = $row['status'];
        array_push($diseases, $disease);
    }
    echo json_encode(['success' => true, 'diseases' => $diseases]);
} else {
    echo json_encode(['success' => false, 'message' => 'no user data']);
}