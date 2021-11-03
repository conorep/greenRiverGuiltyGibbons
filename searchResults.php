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
    <link rel="stylesheet" href="styles/styles.css">

    <!-- Kevin's CSS, Next Two Lines -->
    <link rel="stylesheet" href="styles/questionButtonAndForm_styles.css">
    <link rel="stylesheet" href="styles/questionButtonAndForm_responsiveStyles.css">

    <!--  Favicon  -->
    <link rel="icon" type="img/jpg" href="images/img.png" >

    <title>GRC SDEV SEARCH RESULTS</title>
</head>


<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3" role="navigation">
    <div class="container-fluid">

        <a class="navbar-brand ps-3" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="images/logo2_optimized_inkscape.svg" alt="GRTech Logo"  width="48" height="42" class="d-inline-block align-text-top">
        </a>

        <h3 class="d-block d-lg-none d-xl-none d-xxl-none">Green River College Soft Dev Program<br><em>Frequently Asked Questions</em></h3>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!--For logo, GRC SDEV PROG title, and FAQ title-->
            <ul class="navbar-nav">
                <li class="px-md-4 px-lg-4 px-xl-4 d-none d-lg-block d-xl-block d-xxl-block">
                    <h4>Green River College Software Development Program</h4>
                    <h5><em>Frequently Asked Questions</em></h5>
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
                <li  class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2">
                    <form action="index.html" method="post">
                        <label class="input-group mb-3">
                            <button id="search-btn" type="submit" class="btn btn-success" > Back to FAQ</button>
                        </label>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>


<article class="container-fluid row">

    <div class="col-2"></div>
    <div class="col-8 mt-5">
    <?php

        // TURN ON ERROR REPORTING
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $search_results = $_POST['search-results'];
//        var_dump($search_results);
        echo "<h1>Search Results for: '$search_results'</h1>";

    ?>
    </div>
    <div class="col-2"></div>

</article>



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

                <!--NOTE: all of these groups got deleted recently I guess. I kept the links the greenrivertech page has though. -->
                <ul class="footer-list mb-0 footer-links pl-3">
                    <li>
                        <a class="text-dark" href="https://www.greenriver.edu/about-us/website/privacy-notice.htm" target="_blank">Privacy Policy</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.greenriver.edu/student-affairs/financial-aid/ethical-principles-and-code-of-conduct.htm"
                           target="_blank">Code of Conduct</a>
                    </li>
                    <!--THIS POINTS NOWHERE SO FAR-->
                    <li>
                        <a class="text-dark" href="https://www.software.greenrivertech.net/login.php" target="_blank">Admin Login</a>
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
