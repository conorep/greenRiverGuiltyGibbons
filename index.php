<?php
session_set_cookie_params(0);
session_start();

?>


<!--
    Gr-Guilty-Gibbons FAQ
    Kevin, Conor, Pat
    SDEV 305 2021
    index.php
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
    <link rel="stylesheet" href="styles/styles.css">

    <!-- Kevin's CSS, Next Two Lines -->
    <link rel="stylesheet" href="styles/questionButtonAndForm_styles.css">
    <link rel="stylesheet" href="styles/questionButtonAndForm_responsiveStyles.css">
    <!-- <link rel="stylesheet" href="styles/headerWidth_responsive.css"> -->

    <!--  Favicon  -->
    <link rel="icon" type="img/jpg" href="images/img.png">

    <title>GRC SDEV FAQ</title>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav id="nav-margin-bottom" class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3">
    <div class="container-fluid" id="header-width">

        <a class="navbar-brand pe-3" id="scoot-image" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="images/siteGRGGrivShift2.svg" alt="GRTech Logo" width="200" class="d-inline-block align-text-top">
        </a>

        <ul class="list-unstyled d-block d-lg-none d-xl-none d-xxl-none pt-4">
            <li>
                <h3>GRC Soft Dev Program</h3>
                <h6><em>Frequently Asked Questions</em></h6>
            </li>
        </ul>


        <button class="navbar-toggler mt-4" id="hamburger-nudge" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
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

            </ul>
            <!--search form and button-->
            <div class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-lg-none d-xl-none d-xxl-none">
                <form action="searchResults.php" method="post">
                    <div class="input-group mb-3 w-75">
                        <button id="search-btn1" type="submit" class="input-group-text btn-success"> Search</button>
                        <input name="search-results" type="text" class="form-control text-muted search-text"
                               placeholder="Search Here">
                    </div>
                </form>
            </div>

        </div>

        <!--search form and button-->
        <form id="search-mobile-nudge"
              class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-none d-lg-block d-xl-block d-xxl-block"
              action="searchResults.php" method="post">
            <div class="input-group mb-3">
                <input name="search-results" type="text" class="form-control search-text" placeholder="Search Here">
                <button id="search-btn" type="submit" class="input-group-text btn-success"> Search</button>
            </div>
        </form>

    </div>
</nav>
<!--End nav header-->

<div id="disclaimer"
     class="container bg-warning box-shadows2 mt-3 py-4 alert alert-info alert-dismissible fade show border-0"
     role="alert">
    <h3 id="disclaimer-text" class="px-3"><strong>The information provided here is not official or legally binding.
        This is a resource created by students, for students.</strong></h3>
    <button class="btn-close " data-bs-dismiss="alert" type="button" aria-label="Close"></button>
</div>

<!-- Main body stuff. Dynamically fill all data from database. -->

<?php

require("/home/grguilty/qandaconfig.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT number, question, answer, qna.category_id, category_name
FROM qna
NATURAL JOIN category ORDER BY qna.category_id";
$result = $conn->query($sql);

    // output data of each row

$currentCategory = null;

    while($row = $result->fetch_assoc()) {
        $newCategory = $row["category_name"];

        // check to see what the category name is. if the row has diff category, start a new accordion with new category name
        if ($currentCategory != $newCategory) {
            $currentCategory = $newCategory;

            // check to see whether need to add closing tags
            if ($row["category_name"] != 'Software Development') {
                echo
                '
                            </div>
                        </div>
                   </div>
            </div>
                ';
            }

            echo ' 
            <div class="container accordion" id="accordionExample' .$row["category_id"].'">
                <div class="accordion-item shadow-sm">
                    <h2 class="accordion-header" id="panelsStayOpen-heading'. $row["category_id"].'">
                        <button id="btnid'. $row["category_id"].'" class="accordion-button fw-bold text-uppercase collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse' .$row["category_id"].'" aria-expanded="true"
                                aria-controls="collapse' .$row["category_id"].'">
                                    '.$row["category_name"].'
                        </button>
                    </h2>
                    <div id="collapse' .$row["category_id"].'" class="accordion-collapse collapse "
                         aria-labelledby="collapse' .$row["category_id"].'">
                        <div class="accordion-body">
            ';
        }

        echo '      
                            <p class="question">' . $row["question"] . '<p>' .
                            $row["answer"]
              ;

    }

    // end divs for the last category box
    echo
    '
                            </div>
                        </div>
                   </div>
            </div>
    ';

$conn->close();
?>
<!-- end Q and A content-->


<!--Begin QnA Submit Form Here-->
<!-- id naming conventions from buttons to their containers must match the first -->
<!-- two words or else it breaks the javascript!!! -->
<div id="kevin-container">
    <button type="button" id="button-question"
            class="button-hover-noTransition disable-default-button-styles all-buttons btn-question">
        ASK A QUESTION
    </button>

    <div id="message-sent">
        <div id="processing-message">
            <div>Processing your request...</div>
        </div>
        <iframe src="submissionSuccess.php" id="hide_iframe" name="email_iframe"></iframe>
        <div id="the-x">X</div>
    </div>

    <!--  target="email_iframe" -->
    <!-- onsubmit="return validate_on_submit();" -->
    <!-- onsubmit="return fakeSubmit();" -->
    <!--  -->
    <form name="question_form_name" id="form-question" class="d-block form-group" target="email_iframe"
          action="submissionSuccess.php" onsubmit="return validate_on_submit();" method="POST">
        <!--    <form name="question_form_name" id="form-question" class="d-block form-group" action="submissionSuccess.php" target="email_iframe" onsubmit="return fakeSubmit();" method="POST">-->
        <!-- <form name="question_form_name" id="form-question" action="submissionSuccess.php" target="email_iframe" class="d-block form-group" method="POST"> -->
        <!-- container for form elements -->
        <div id="question-div" class="form-group">
            <span class="error" id="error-question">Please Enter Question</span>
            <textarea class="form-control" id="question-entry" rows="8" cols="40" name="question"
                      placeholder="Ask a Question"></textarea>
            <span class="error" id="error-fname">Please Enter First Name</span>
            <input type="text" class="form-control" id="fname-entry" name="fName" placeholder="First Name">
            <span class="error" id="error-lname">Please Enter Last Name</span>
            <input type="text" class="form-control" id="lname-entry" name="lName" placeholder="Last Name">
            <span class="error" id="error-email">Please Enter Email</span>
            <input type="text" class="form-control" id="email-entry" name="email" placeholder="Contact Email">
            <!-- id naming conventions from buttons to their containers must match the first -->
            <!-- two words or else it breaks the javascript!!! -->
            <button type="submit" id="button-submit"
                    class="button-hover-noTransition disable-default-button-styles all-buttons btn-submit">
                SUBMIT QUESTION
            </button>

        </div>
    </form>
</div>
<!--End Kevin's QnA Here-->


<?php
include('include/includeFooter.php');
?>
