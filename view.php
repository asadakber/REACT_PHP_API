<?php 

    require 'connect.php';

    error_reporting(E_ERROR);

    $students = [];
    $sql = "SELECT * FROM students";

    if($result = mysqli_query($con, $sql)) {
        $cr = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $students[$cr]['sid'] = $row['sid'];
            $students[$cr]['fName'] = $row['fName'];
            $students[$cr]['lName'] = $row['lName'];
            $students[$cr]['email'] = $row['email'];
            $cr++;
        }

        // print_r($students);

        echo json_encode($students);

    } else {
        http_response_code(404);
    }


?>