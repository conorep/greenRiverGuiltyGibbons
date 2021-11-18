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
    <link rel="stylesheet" href="styles/searchStyles.css.css">


    <!-- Kevin's CSS, Next Two Lines -->
    <link rel="stylesheet" href="styles/questionButtonAndForm_styles.css">
    <link rel="stylesheet" href="styles/questionButtonAndForm_responsiveStyles.css">
    <link rel="stylesheet" href="styles/headerWidth_responsive.css">

    <!--  Favicon  -->
    <link rel="icon" type="img/jpg" href="images/img.png" >

    <title>GRC SDEV SEARCH RESULTS</title>
</head>


<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3" >
    <div class="container-fluid">

        <a class="navbar-brand" id="scoot-image" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="images/siteGRGGrivShift.svg" alt="GRTech Logo"  width="200"  class="d-inline-block align-text-top">
        </a>

        <h3 class="d-block d-lg-none d-xl-none d-xxl-none pt-4">GRC Soft Dev Program<br><em>Frequently Asked Questions</em></h3>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!--For logo, GRC SDEV PROG title, and FAQ title-->
            <ul class="navbar-nav">
                <li class="px-md-4 px-lg-4 px-xl-4 d-none d-lg-block d-xl-block d-xxl-block">
                    <h4>Green River College Software Development Program</h4>
                    <h5><em>Search Results</em></h5>
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


            </ul>

        </div>

        <!--back to faq button-->
        <form id="search-mobile-nudge" class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3" action="index.html" method="post">
            <div class="input-group mb-3">
                <button type="submit" class="input-group-text btn-success" > Back to FAQ</button>
            </div>
        </form>

    </div>
</nav>

<div id="disclaimer" class="container bg-warning box-shadows2 mt-3 py-4 alert alert-info alert-dismissible fade show border-0" role="alert">
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

<!--
user
9]QdhnkZAJqc
-->

<?php

require("/home/grguilty/qandaconfig.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT question, answer, category, number 
FROM qna
WHERE (question like '%$search_results%'
or answer like '%$search_results%')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo '<div class="container accordion" id="accordionExample' .$row["number"].'">
    <div class="accordion-item shadow-sm">
        <h2 class="accordion-header" id="heading' .$row["number"].'">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse' .$row["number"].'" aria-expanded="true"
                    aria-controls="collapse' .$row["number"].'">'.
            $row["question"].
            '</button>
        </h2>
        <div id="collapse' .$row["number"].'" class="accordion-collapse collapse "
             aria-labelledby="heading' .$row["number"].'">
            <div class="accordion-body">'.
            $row["answer"].
        '</div>
        </div>
    </div>
</div>';

    }
} else {
    echo "0 results";
}

$conn->close();
?>


<div class="container ">
    <!--search form and button-->
    <form  class="d-flex" action="searchResults.php" method="post">
        <div class="input-group mx-5 p-5 justify-content-center ">
            <input name="search-results" type="text" class="form-control search-text" placeholder="Search Here" >
            <button id="search-btn" type="submit" class="input-group-text btn-success" > Search Again?</button>
        </div>
    </form>
</div>


<!--Footer begins here-->
<footer class="bg-light text-center text-lg-start footer mt-auto py-3 pb-0">

    <!-- Grid container -->
    <div class="container p-4  ">

        <!--Grid row-->
        <div class="row ">

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-4">
                <h5 class="text-uppercase text-center">Green River College</h5>
                <hr>
                <p class="footer-links">This site provides information and resources
                    for students in Green River's Bachelor's of
                    Applied Science - Software Development
                    program.</p>
            </div>

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-5">
                <h5 class="text-uppercase mb-0 text-center">Useful Links</h5>
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
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-5">
                <h5 class="text-uppercase text-center">Follow</h5>
                <hr>

                <!--Links to associated linkedIn/Instagram/Facebook pages -->
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
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-5">
                <h5 class="text-uppercase text-center">Legal</h5>
                <hr>

                <!--Links to FinAid/Ethics pages -->
                <ul class="footer-list mb-0 footer-links pl-3">
                    <li>
                        <a class="text-dark" href="https://www.greenriver.edu/about-us/website/privacy-notice.htm" target="_blank">Privacy Policy</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.greenriver.edu/student-affairs/financial-aid/ethical-principles-and-code-of-conduct.htm"
                           target="_blank">Code of Conduct</a>
                    </li>

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

</body>
</html>