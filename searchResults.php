<?php
session_set_cookie_params(0);
session_start();
$_SESSION["current_page_js"] = "searchResults.php";
?>

<!--
    Gr-Guilty-Gibbons FAQ
    Kevin, Conor, Pat
    SDEV 305 2021
    searchResults.php
-->

<!doctype html>
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
    <link rel="stylesheet" href="styles/searchStyles.css">

    <!-- Kevin's CSS, Next Two Lines -->
    <link rel="stylesheet" href="styles/questionButtonAndForm_styles.css">
    <link rel="stylesheet" href="styles/questionButtonAndForm_responsiveStyles.css">
    <link rel="stylesheet" href="styles/headerWidth_responsive.css">
    <link rel="stylesheet" href="styles/styles.css">

    <!--  Favicon  -->
    <link rel="icon" type="img/jpg" href="images/img.png">

    <title>GRC SDEV SEARCH RESULTS</title>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3">
    <div class="container-fluid">

        <a class="navbar-brand" id="scoot-image" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="images/siteGRGGrivShift2.svg" alt="GRTech Logo" width="200" class="d-inline-block align-text-top">
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
            </ul>
        </div>

        <!--back to faq button-->
        <form id="search-mobile-nudge" class="px-md-2 search-margin-even px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3"
              action="index.php" method="post">
            <div class="input-group mb-3">
                <button type="submit" class="input-group-text btn-success"> Back to FAQ</button>
            </div>
        </form>

    </div>
</nav>

<div id="disclaimer"
     class="container bg-warning box-shadows2 mt-3 py-4 alert alert-info alert-dismissible fade show border-0"
     role="alert">
    <!--    <h2 class="row text-center"> Disclaimer</h2>-->

    <h3 id="disclaimer-text" class="px-3"><strong>The information provided here is not official or legally binding.
            This is a resource created by students, for students.</strong></h3>
    <button class="btn-close " data-bs-dismiss="alert" type="button" aria-label="Close"></button>

</div>

<!--main body with search results stuff-->
<article class="container-fluid row">

    <div class="col-2"></div>
    <div class="col-8 mt-5">

        <?php

        // TURN ON ERROR REPORTING
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $search_results = $_POST['search-results'];

        echo "<h1>Search Results for: '$search_results'</h1>";

        ?>

        <br>

    </div>
    <div class="col-2"></div>

</article>

<?php

require("/home/grguilty/qandaconfig.php");
// require("../qandaconfig.php"); //////////////////////////////////////////////////////////////////////// DELETE
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT number, question, answer, qna.category_id, category_name
FROM qna
NATURAL JOIN category
WHERE (question like '%$search_results%'
or answer like '%$search_results%')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        // paperclip graphic
        include('include/paperClip.php');

        // setup the paperclip for php insertion
        $paperClipOrNot = '<div data-toggle="tooltip" title="Copy Link to Clipboard" id="clip-for-question-' .
            $row['number'] . '" class="paperClips paperClips-sr">' . $paperClipSearch . '</div>';

        echo '<div class="container accordion" id="accordionExample' . $row["number"] . '">' . '
    <div class="accordion-item shadow-sm">
        <div class="accordion-header headers-relative-pos" id="heading' . $row["number"] . '">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse' . $row["number"] . '" aria-expanded="true"
                    aria-controls="collapse' . $row["number"] . '">' .
            $row["question"] .
            '</button>' . $paperClipOrNot . '
        </div>
        <div id="collapse' . $row["number"] . '" class="accordion-collapse collapse "
             aria-labelledby="heading' . $row["number"] . '">
            <div class="accordion-body">' .
            $row["answer"] .
            '</div>
        </div>
    </div>
</div>';

    }
} else {
    echo "<p class='pl-5 ml-5'>0 results</p>";
}

$conn->close();
?>

<div class="container ">
    <!--search form and button-->
    <form class="d-flex" action="searchResults.php" method="post">
        <div class="input-group mr-xs-5 mr-sm-5 mx-md-5 mx-lg-5 mx-xl-5 mx-xxl-5 p-5 justify-content-center ">
            <input name="search-results" type="text" class="form-control search-text" placeholder="Search Here">
            <button id="search-btn" type="submit" class="input-group-text btn-success"> Search</button>
        </div>
    </form>
</div>

<?php
include('include/includeFooter.php');
?>
