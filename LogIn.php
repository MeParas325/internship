<?php

$name = "";

if(isset($_POST['submit'])){
    $fp = fopen('data.csv', 'r');
    $fs = filesize('data.csv');
    $seperator = ",";
    
    while($row = fgetcsv($fp, $fs, $seperator)){
        $name = $row[0];
        if($name == $_POST['name']){
            header("Location: thankyou.php");
            exit;
        }
    }
    echo "user is not found.";
    exit;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="container">
        <div class="sign-up">
                <h2>LogIn</h2>
                <form method="post">
                    <label>Enter Your Name</label>
                    <input name="name" type="text" placeholder="Enter your name"class="input-field">

                    <label>Enter Your Email</label>
                    <input name="email" type="email" placeholder="Enter your email"class="input-field">

                    <label>Enter Your Phone No.</label>
                    <input name="mobile" type="number" placeholder="Enter your phone no" class="input-field">
                    <button class="bott" type="submit" name="submit">Submit</button>
                    <span>Create an account? <a href="./SignUp.php">SignUp</a></span>
                </form>
        </div>
    </div>
</body>
</html>