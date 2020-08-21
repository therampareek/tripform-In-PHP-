<?php
$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to the database failed due to" .mysqli_connect_error());
}

// echo "Success connection to the db";

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['other'];

$sql =  "INSERT INTO `trip`.`trip`( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email ', '$phone', '$other', current_timestamp());";
// echo $sql;

if($con->query($sql) == true){
    // echo "Successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class="bg" src="bg.jpg" alt="SMS JAIPUR">
    <div class="container">
        <h1>Welcome to Sawai Man Singh JAIPUR US Trip form </h1>
        <p>Enter your details and submit this form  to confirm participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US Trip</p>";
         }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" autocomplete="off">
            <input type="text" name="age"  id="age" placeholder="Enter your age" autocomplete="off">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" autocomplete="off">
            <input type="email" name="email" placeholder="Enter your email" autocomplete="off">
            <input type="phone" name="phone" placeholder="Enter your phone" autocomplete="off">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>