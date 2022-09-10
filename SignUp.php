<?php

$error = "";
$name = "";
$email = "";
$number = null;

function clean_text($string){
    $string = trim($string);
    $string = stripcslashes($string);
    $string = htmlspecialchars($string);

    return $string;
}

if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        echo "Please enter your name";
    }else{
        $name = clean_text($_POST['username']);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            echo "Only letters and white space allowed";
        }
    }

    if(empty($_POST['useremail'])){
        echo "Please enter your email";
    }else{
        $email = clean_text($_POST['useremail']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Enter valid email address";
        }
    }

    if(empty($_POST['usernumber'])){
        echo "Please enter your number";
    }else{
        $number = $_POST['usernumber'];
        if($number<0){
            echo "Enter the valid number";
        }
    }
    if($error == ""){
        $file_open = fopen("data.csv", "a");
        $no_rows = count(file("data.csv"));
        
        if($no_row>1){
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            'Sno' => $no_row,
            'Name' => $name,
            'Email' => $email,
            'Mobile' => $number);
            fputcsv($file_open, $form_data);
            echo "Successfully data inserted in the file";
    }
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
                    <input name="username" type="text" placeholder="Enter your name"class="input-field">

                    <label>Enter Your Email</label>
                    <input name="useremail" type="email" placeholder="Enter your email"class="input-field">

                    <label>Enter Your Phone No.</label>
                    <input name="usernumber" type="number" placeholder="Enter your phone no" class="input-field">
                    <button class="bott" type="submit">Submit</button>
                    <span>Already have an account? <a href="./LogIn.php">Login</a></span>
                </form>
        </div>
    </div>
</body>
</html>