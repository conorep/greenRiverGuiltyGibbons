<?php
ob_start();
$username = "admin";
$password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputName = $_POST["username"];
    $usernameErr = "";
    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    } else {
        if ($inputName != $username) {
            $usernameErr = "Invalid name entered";
        }
    }

    $inputPassword = $_POST["password"];
    $passwordErr = "";
    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a password";

    } else {
        if ($inputPassword != $password) {
            $passwordErr = "Invalid password entered";
        }
    }

    if ($usernameErr == "" && $passwordErr=="") {
        header('Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminPanel.html');
        exit();

    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Test Login</title>
</head>
<body>
    <form method="post"  action="<?php echo $_SERVER["PHP_SELF"];?>" >
        <label for="name">First Name</label>
        <span class="error"> <?php echo $usernameErr;?></span>
        <input type="text" class="form-control" id="name" placeholder="Username" name="username">

        <label for="password">Password</label>
        <span class="error"> <?php echo $passwordErr;?></span>
        <input type="text" class="form-control" id="lName" placeholder="Password" name="password">
    <button type="submit" >Submit</button>
    </form>
<!--<div id="flag" class=""></div>-->
</body>
</html>