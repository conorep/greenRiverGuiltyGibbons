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
    <link rel="icon" type="img/jpg" href="../images/img.png" >

    <title>GR TECH ADMIN PANEL</title>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center">

<!--This is the page nav header-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm pt-3 pb-3">
    <div class="container-fluid">

        <a class="navbar-brand ps-3" href="https://www.software.greenrivertech.net/" target="_blank">
            <img src="../images/siteGRGGrivShift2.svg" alt="GRTech Logo"  width="200"  class="d-inline-block align-text-top">
        </a>

        <h3 class="d-block d-lg-none d-xl-none d-xxl-none pt-4">GRC Soft Dev Program<br><em>Frequently Asked Questions</em></h3>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!--For logo, GRC SDEV PROG title, and FAQ title-->
            <ul class="navbar-nav">
                <li class="px-md-4 px-lg-4 px-xl-4 d-none d-lg-block d-xl-block d-xxl-block">
                    <h4>Green River College Software Development Program</h4>
                    <h5><em>Admin Control Panel</em></h5>
                </li>
            </ul>

            <!--   Spacer-->
            <ul class="navbar-nav" id="spacer">
            </ul>
        </div>

        <!--search form and button-->
        <div  class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-lg-none d-xl-none d-xxl-none">
            <form action="../searchResults.php" method="post">
                <div class="input-group mb-3 w-75">
                    <button id="search-btn1" type="submit" class="input-group-text btn-success" > Search</button>
                    <input name="search-results" type="text" class="form-control text-muted search-text" placeholder="Search Here" >
                </div>
            </form>
        </div>

        <!--search form and button-->
        <form id="search-mobile-nudge1" class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3 d-none d-lg-block d-xl-block d-xxl-block" action="../searchResults.php" method="post">
            <div class="input-group mb-3">
                <input name="search-results" type="text" class="form-control search-text" placeholder="Search Here" >
                <button id="search-btn" type="submit" class="input-group-text btn-success" > Search</button>
            </div>
        </form>

        <!--back to faq button-->
        <form id="search-mobile-nudge" class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3" action="../index.html" method="post">
            <div class="input-group mb-3">
                <button type="submit" class="input-group-text btn-success" > Back to FAQ</button>
            </div>
        </form>

    </div>
</nav>
<!--Nav ends here-->

<!-- no Disclaimer on Admin page -->

<!--Control Panel Content Here-->

<div class="container py-4"><!--content container-->

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1500" >
        <div class="toast-body">
            <strong>Admin login successful!</strong>
        </div>
    </div>

    <table id="guestbook-entries" class="display " style="width:100%">
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
            $sql ="SELECT * FROM client_questions";
            $result = mysqli_query($cnxn, $sql);

            foreach($result as $row) {

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

</div><!--end content container-->


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

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>


<!--is this needed-->
<!-- Kevin's Script Below -->
<script src="../scripts/questionButtonAndForm_script.js"></script>

<!--YOU DONT NEED HTTPS: OR HTTP:. WOAH-->
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
    $('#guestbook-entries').DataTable(
        {
            responsive: true
        }
    );

    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>


</body>
</html>