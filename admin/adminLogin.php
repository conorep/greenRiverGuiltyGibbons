<?php
ob_start();
$username = "admin";
$password = "@dm1n";
$tryAgain = "";

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

    //'try again' structure here
/*    if ($inputPassword != $password || $inputName != $username) {
       $tryAgain = "Please try again.";

    }*/

    if ($usernameErr == "" && $passwordErr=="") {
        header('Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminPanel.html');
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
    <link rel="icon" type="img/jpg" href="../images/img.png" >

    <title>GR TECH ADMIN PANEL</title>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3">
    <div class="container-fluid">

        <a class="navbar-brand ps-3" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="../images/logo2_optimized_inkscape.svg" alt="GRTech Logo"  width="48" height="42" class="d-inline-block align-text-top">
        </a>

        <h3 class="d-block d-lg-none d-xl-none d-xxl-none">Green River College Soft Dev Program<br><em>Admin Login</em></h3>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!--For logo, GRC SDEV PROG title, and FAQ title-->
            <ul class="navbar-nav">
                <li class="px-md-4 px-lg-4 px-xl-4 d-none d-lg-block d-xl-block d-xxl-block">
                    <h4>Green River College Software Development Program</h4>
                    <h5><em>Admin Login</em></h5>
                </li>
            </ul>

            <!--   Spacer-->
            <ul class="navbar-nav" id="spacer">
            </ul>

            <!--Remainder of navbar-->
            <ul class="navbar-nav">


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
                            <a class="dropdown-item" href="https://www.linkedin.com/learning/" target="_blank">LinkedIn Learning</a>
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
                            <a class="dropdown-item" href="https://advisingapp.greenrivertech.net/" target="_blank">Advising App</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://grcc.greenriver.edu/Register/waci004.html" target="_blank">Advising Lookup</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://greenrivertech.net/advisors.php" target="_blank">10 Questions for Advisees</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://www.greenriver.edu/students/pay-for-college/" target="_blank">Money For College</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://medium.com/green-river-web-mobile-developers" target="_blank">Program Blog</a>
                </li>

                <!--search form and button-->
                <!--<li  class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2">
                    <form action="searchResults.php" method="post">
                        <label class="input-group mb-3">
                            <input name="search-results" type="text" class="form-control " placeholder="Search Here" >
                            <button id="search-btn" type="submit" class="input-group-text btn-success" > Search</button>
                        </label>
                    </form>
                </li>-->

            </ul>

        </div>

        <!--search form and button-->
        <form id="search-mobile-nudge" class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2" action="searchResults.php" method="post">
            <div class="input-group mb-3">
                <input name="search-results" type="text" class="form-control " placeholder="Search Here" >
                <button id="search-btn" type="submit" class="input-group-text btn-success" > Search</button>
            </div>
        </form>

    </div>
</nav>
<!--Nav ends here-->



<!--ADMIN LOGIN HERE-->
<!--<form method="post"  action="<?php /*echo $_SERVER["PHP_SELF"];*/?>" >
    <label for="username">Username</label>
    <span class="error"> <?php /*echo $usernameErr;*/?></span>
    <input type="text" class="form-control" id="username" placeholder="Username" name="username">

    <label for="password">Password</label>
    <span class="error"> <?php /*echo $passwordErr;*/?></span>
    <input type="text" class="form-control" id="password" placeholder="Password" name="password">
    <button type="submit" >Submit</button>
    <span class="error"> <?php /*echo $tryAgain;*/?></span>
</form>-->


<div class="container">

    <!--Bootstrap login here-->
    <form  method="post" class="card box-shadows " id="adminLogin"  action="<?php echo $_SERVER["PHP_SELF"];?>" >

        <fieldset>
            <div class="form-group d-grid gap-3">
                <div>
                    <label for="username">Username:</label>
                    <span class="error"> <?php echo $usernameErr;?></span>
                    <input type="text" class="form-control" id="username" placeholder="username" name="username">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <span class="error"> <?php echo $passwordErr;?></span>
                    <input type="text" class="form-control" id="password" placeholder="password" name="password">
                </div>
                <div>
                    <button type="submit" class="button-hover-noTransition btn-admin btn-question mt-2">Submit</button>
                </div>
                <span class="error"> <?php echo $tryAgain;?></span>
            </div>

        </fieldset>

    </form>

</div>




<!--Footer begins here-->
<footer class="bg-light text-center text-lg-start footer mt-auto py-3 pb-0">

    <!-- Grid container -->
    <div class="container p-4  justify-content-around">

        <!--Grid row-->
        <div class="row justify-content-around">

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase">Green River College</h5>
                <hr>
                <p class="footer-links">This site provides information and resources
                    for students in Green River's Bachelor's of
                    Applied Science - Software Development
                    program.</p>
            </div>

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase mb-0">Useful Links</h5>
                <hr>
                <ul class="footer-list footer-links">
                    <li>
                        <a class="text-dark" href="https://www.itconnect.greenrivertech.net/internships" target="_blank">Internships</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.itconnect.greenrivertech.net/studentResources" target="_blank">Student Resources</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.boardmasters.greenriverdev.com/" target="_blank">BoardMasters Club</a>
                    </li>
                </ul>
            </div>

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase">Follow</h5>
                <hr>

                <!--NOTE: all of these groups got deleted recently I guess. I kept the links the greenrivertech page has though. -->
                <ul class="footer-list mb-0 footer-links">
                    <li>
                        <a class="text-dark" href="https://www.instagram.com/greenriverc/" target="_blank">Instagram</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.linkedin.com/school/green-river-community-college/" target="_blank">LinkedIn</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.facebook.com/greenriverdevs/" target="_blank">Facebook</a>
                    </li>
                </ul>
            </div>

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase ">Legal</h5>
                <hr>

                <!--Links to associated linkedIn/Instagram/Facebook pages -->
                <ul class="footer-list mb-0 footer-links pl-3">
                    <li>
                        <a class="text-dark" href="https://www.greenriver.edu/about-us/website/privacy-notice.htm" target="_blank">Privacy Policy</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.greenriver.edu/student-affairs/financial-aid/ethical-principles-and-code-of-conduct.htm"
                           target="_blank">Code of Conduct</a>
                    </li>
                    <!--THIS POINTS NOWHERE USEFUL SO FAR-->
                    <li>
                        <a class="text-dark" href="https://gr-guilty-gibbons.greenriverdev.com/admin/adminLogin.php" target="_blank">Admin Login</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Green River College Technology Program
    </div>
    <!-- Copyright -->
</footer>
<!--End footer here-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Kevin's Script Below -->
<script src="../scripts/questionButtonAndForm_script.js"></script>


</body>
</html>
