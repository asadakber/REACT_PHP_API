<?php 

    require 'connect.php';

    $postdata = file_get_contents("php://input");

    if(isset($postdata) && !empty($postdata))
    {
        $request = json_decode($postdata);

        print_r($request);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;

        $sql ="INSERT INTO `students`(
        `fName`, 
        `lName`, 
        `email`
        ) VALUES 
        ('{$firstname}',
         '{$lastname}',
         '{$email}')";

         if(mysqli_query($con, $sql))
         {
             http_response_code(201);
         } else {
            http_response_code(422);
         }
        
    }
?>

