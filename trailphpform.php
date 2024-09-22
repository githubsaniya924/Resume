<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>trial php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="Personal_Portfolio_style.css"></link>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        h1,h3{
            text-align: center;
            color: white;
        }
        .container-fluid{
            padding-top: 240px;
            padding-bottom: 328px;
            text-align: center;
        }

    </style>
</head>
<body>

<?php
    $servername="localhost:3307";
    $username="root";
    $password="";
    $dbname="trial_dataset";


    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
    	die("connection failed: ".$conn->connect_error);
    }

    // else{
    // 	echo "connection successful";
    // }

    $fname = $_POST['txt_fname'];
    $lname = $_POST['txt_lname'];
    // $email_id = $_POST['txt_email'];
    // $mobile_no = $_POST['mobile'];
    // $time_slot = $_POST['timeslot'];
    // $occupation = $_POST['occupation'];

    // echo "<h3> $fname<br> $email_id<br>$time_slot<br>$occupation";

    $stmt = $conn->prepare("INSERT INTO trial_table(fname,lname) VALUES(?,?)");

    $stmt->bind_param("ss",$fname,$lname);

    if($stmt->execute()){
       echo "<div class='container-fluid bg-dark'>
       <i class='fa-solid fa-check fa-2xl' style='color: #12c41e;font-size:50px'></i><br><br><h1>Congratulations $fname!</h1><br>
              <h3>You have successfully registered for the workshop</h3></div>";

    }
    else{
        echo "<div class='container-fluid bg-dark'><i class='fa-solid fa-xmark fa-2xl' style='color: #f52314;font-size:50px'></i><br><br><h1> Oops!</h1><br>
              <h3>Registration unsuccessful</h3></div>";
        echo "<h3>error: $stmt->error</h3>";
    }

    $stmt->close();
    $conn->close();
?>
</body>
</html>