<?php
ob_start();
session_set_cookie_params(0);
session_start();
$username = "admin";
$password = "@dm1n";
$tryAgain = "";

if (isset($_SESSION['grguiltyuse']))
    // Checking whether the session is already there or not if
    // true then header redirect it to the home page directly
{
    header("Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminPanel.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputName = $_POST["username"];
    $usernameErr = "";

    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    } else {
        if ($inputName != $username) {
            $usernameErr = "Invalid username entered";
            $tryAgain = "Please try again.";
        }
    }

    $inputPassword = $_POST["password"];
    $passwordErr = "";

    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a password";
    } else {
        if ($inputPassword != $password) {
            $passwordErr = "Invalid password entered";
            $tryAgain = "Please try again.";
        }
    }


    if ($usernameErr == "" && $passwordErr == "") {
        $_SESSION['grguiltyuse'] = $username;
        header('Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminPanel.php');
        exit();
    }
}
?>

<!--
    Gr-Guilty-Gibbons FAQ
    Kevin, Conor, Pat
    SDEV 305 2021
    adminLogin.php
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--    Page Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!--    Bootstrap Styles and Main Styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">

    <!-- Kevin's CSS, Next Two Lines -->
    <link rel="stylesheet" href="../styles/questionButtonAndForm_styles.css">
    <link rel="stylesheet" href="../styles/questionButtonAndForm_responsiveStyles.css">

    <!--  Favicon  -->
    <link rel="icon" type="img/jpg" href="../images/img.png">

    <title>GR TECH ADMIN PANEL</title>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3">
    <div class="container-fluid">

        <a class="navbar-brand px-md-0 px-3 mx-auto mx-sm-0" id="scoot-image" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="../images/siteGRGGrivShift2.svg" alt="GRTech Logo" width="200"
                 class="d-inline-block align-text-top">
        </a>

        <ul class="list-unstyled d-block d-lg-none d-xl-none d-xxl-none pt-4">
            <li>
                <h3>GRC Soft Dev Program</h3>
                <h6><em>Frequently Asked Questions</em></h6>
            </li>
        </ul>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-column" id="navbarNavDropdown">

            <!--For logo, GRC SDEV PROG title, and FAQ title-->
            <ul class="navbar-nav flex-row">
                <li class="px-md-4 px-lg-4 px-xl-4 d-none d-lg-block d-xl-block d-xxl-block text-center">
                    <h4>Green River College Software Development</h4>
                    <h5 class=""><em>Frequently Asked Questions</em></h5>
                </li>
            </ul>


            <!--Remainder of navbar-->
            <ul class="navbar-nav flex-md-row flex-lg-row flex-xl-row flex-xxl-row justify-content-around">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ResourceDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Learning Resources
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="https://leetcode.com/" target="_blank">LeetCode</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://www.linkedin.com/learning/" target="_blank">LinkedIn
                                Learning</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://replit.com/" target="_blank">Repl</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Advising
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="https://advisingapp.greenrivertech.net/" target="_blank">Advising
                                App</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://grcc.greenriver.edu/Register/waci004.html"
                               target="_blank">Advising Lookup</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://greenrivertech.net/advisors.php" target="_blank">10
                                Questions for Advisees</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://www.greenriver.edu/students/pay-for-college/" target="_blank">Money
                        For College</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://medium.com/green-river-web-mobile-developers" target="_blank">Program
                        Blog</a>
                </li>

                <!--search form and button-->
                <li class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-lg-none d-xl-none d-xxl-none">
                    <form action="../searchResults.php" method="post">
                        <div class="input-group mb-3 w-75">
                            <button id="search-btn1" type="submit" class="input-group-text btn-success"> Search</button>
                            <input name="search-results" type="text" class="form-control text-muted search-text"
                                   placeholder="Search Here">
                        </div>
                    </form>
                </li>

            </ul>

        </div>

        <!--search form and button-->
        <form id="search-mobile-nudge1"
              class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-none d-lg-block d-xl-block d-xxl-block"
              action="../searchResults.php" method="post">
            <div class="input-group mb-3">
                <input name="search-results" type="text" class="form-control search-text" placeholder="Search Here">
                <button id="search-btn" type="submit" class="input-group-text btn-success"> Search</button>
            </div>
        </form>

        <!--back to faq button-->
        <form id="search-mobile-nudge" class="d-none d-md-block px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3" action="../index.php"
              method="post">
            <div class="input-group mb-3 ">
                <button type="submit" class="input-group-text btn-success "> Back to FAQ</button>
            </div>
        </form>

        <!--back to faq button for small screens (floats right)-->
        <form id="search-mobile-nudge2" class="d-md-none d-block px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 row w-100" action="../index.php"
              method="post">
            <div class="input-group mb-3 ">
                <button type="submit" class="input-group-text btn-success ms-md-0 ms-auto"> Back to FAQ</button>
            </div>
        </form>

    </div>
</nav>
<!--Nav ends here-->

<div id="disclaimer"
     class="container bg-warning box-shadows2 mt-3 py-4 alert alert-info alert-dismissible fade show border-0"
     role="alert">

    <h3 id="disclaimer-text" class="px-3"><strong>The information provided here is not official or legally binding.
            This is a resource created by students, for students.</strong></h3>
    <button class="btn-close " data-bs-dismiss="alert" type="button" aria-label="Close"></button>

</div>


<div class="container">

    <!--Admin login here-->
    <form method="post" class="card box-shadows mb-5" id="adminLogin" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <fieldset>
            <div class="form-group d-grid gap-3">
                <div>
                    <label for="username">Username:</label>
                    <span class="error"> <?php echo $usernameErr; ?></span>
                    <input type="text" class="form-control" id="username" placeholder="username" name="username">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <span class="error"> <?php echo $passwordErr; ?></span>
                    <input type="password" class="form-control" id="password" placeholder="password" name="password">
                </div>
                <div>
                    <button type="submit" class="button-hover-noTransition btn-admin btn-question mt-2">Submit</button>
                </div>
                <span class="error"> <?php echo $tryAgain; ?></span>
            </div>

        </fieldset>

    </form>

</div>


<?php
include('../include/includeFooter.php');
?>
