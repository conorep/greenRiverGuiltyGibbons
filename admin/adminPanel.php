<?php
session_set_cookie_params(0);
session_start();

if (!isset($_SESSION['grguiltyuse'])) // If session is not set then redirect to Login Page
{
    /*echo "<p>You are not logged in. Sending you to login page.</p>";*/
    header("Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminLogin.php");
    exit();
}

$adminFooter = 'yes';
?>

    <!--
        Gr-Guilty-Gibbons FAQ
        Kevin, Conor, Pat
        SDEV 305 2021
        adminPanel.php
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

        <!--datatables stuff-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

        <!--  Favicon  -->
        <link rel="icon" type="img/jpg" href="../images/img.png">

        <title>GR TECH ADMIN PANEL</title>
    </head>

<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3">
    <div class="container-fluid">

        <a class="navbar-brand ps-3 mx-auto mx-sm-0" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="../images/siteGRGGrivShift2.svg" alt="GRTech Logo" width="200"
                 class="d-inline-block align-text-top">
        </a>

        <ul class="list-unstyled d-block d-lg-none d-xl-none d-xxl-none pt-4">
            <li>
                <h3>GRC Soft Dev Program</h3>
                <h6><em>Frequently Asked Questions</em></h6>
            </li>
        </ul>

        <div class="collapse navbar-collapse flex-column" id="navbarNavDropdown">

            <!--For logo, GRC SDEV PROG title, and FAQ title-->
            <ul class="navbar-nav flex-row">
                <li class="px-md-4 px-lg-4 px-xl-4 d-none d-lg-block d-xl-block d-xxl-block text-center">
                    <h4>Green River College Software Development</h4>
                    <h5 class=""><em>Frequently Asked Questions</em></h5>
                </li>
            </ul>

        </div>

        <!--search form and button-->
        <div class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-block d-md-none">
            <form action="../searchResults.php" method="post">
                <div class="input-group mb-3 w-75">
                    <button id="search-btn1" type="submit" class="input-group-text btn-success"> Search</button>
                    <input name="search-results" type="text" class="form-control text-muted search-text"
                           placeholder="Search Here">
                </div>
            </form>
        </div>


        <!--search form and button-->
        <form id="search-mobile-nudge1"
              class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-none d-md-block "
              action="../searchResults.php" method="post">
            <div class="input-group mb-3">
                <input name="search-results" type="text" class="form-control search-text" placeholder="Search Here">
                <button id="search-btn" type="submit" class="input-group-text btn-success"> Search</button>
            </div>
        </form>

        <!--back to faq button-->
        <form id="search-mobile-nudge" class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3" action="../index.php"
              method="post">
            <div class="input-group mb-3">
                <button type="submit" class="input-group-text btn-success"> Back to FAQ</button>
            </div>
        </form>

    </div>
</nav>
<!--Nav ends here-->


<!-- Control Panel Content Here -->

<!-- content container -->
<div class='container py-4'>
    <p class="mb-3"><a href="adminAddQuestion.php">NEW QUESTION, CATEGORY, ADMIN EMAIL</a></p>

    <div class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-delay='1500'>
        <div class='toast-body'>
            <strong>Admin login active.</strong>
        </div>
    </div>


    <table id='guestbook-entries' class='display' style='width:100 % '>
        <thead>
        <tr>
            <th>Message ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Question</th>
        </tr>
        </thead>

        <tbody>

        <?php

        // TURN ON ERROR REPORTING
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        require("/home/grguilty/configs.php");

        $cnxn = mysqli_connect($db_host, $db_user, $db_password, $db_database)
        or die("Error connecting to the database.");

        // display client questions
        $sql = "SELECT * FROM client_questions";
        $result = mysqli_query($cnxn, $sql);

        foreach ($result as $row) {

            $entry_id = $row['entry_id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $question = $row['question'];
            $entry_date = date("m/d/Y H:i:s", strtotime($row['entry_date']));


            echo "
               <tr>          
                    <td>$entry_id</td>
                    <td>$entry_date</td>
                    <td>$fname $lname</td>
                    <td>$email</td>
                    <td>$question</td>
                </tr>";
        }
        ?>

        </tbody>

        <tfoot>
        <tr>
            <th>Message ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Question</th>
        </tr>
        </tfoot>

    </table>

</div>
<!--end content container-->


<?php
include('../include/includeFooter.php');
?>