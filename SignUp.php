<?php

$error = "";
$name = "";
$email = "";
$number = null;

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['mobile'];

    if($name == "" || $email == "" || $number < 0){
        echo "enter valid information or do not leave any blank field.";
        exit;
    }

    $line = "$name, $email, $number\n";
    $fp = fopen("data.csv", "a");
    fwrite($fp, $line);
    echo "Submitted successfully";
    fclose($fp);

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
                <h2>Sign up</h2>
                <form method="post">
                    <label>Enter Your Name</label>
                    <input name="name" type="text" placeholder="Enter your name"class="input-field">

                    <label>Enter Your Email</label>
                    <input name="email" type="email" placeholder="Enter your email"class="input-field">

                    <label>Enter Your Phone No.</label>
                    <input name="mobile" type="number" placeholder="Enter your phone no" class="input-field">
                    <button class="bott" type="submit" name="submit">Submit</button>
                    <span>Already have an account? <a href="./LogIn.php">Login</a></span>
                </form>
        </div>
    </div>
</body>
</html>