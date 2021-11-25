<?php

echo '

<!--Footer begins here-->
<footer class="bg-light text-center text-lg-start footer mt-auto py-3 pb-0">

' ;

if(isset($_SESSION['grguiltyuse']))
{
echo
     '<a class="float-end pe-5 pb-3" href="https://gr-guilty-gibbons.greenriverdev.com/admin/adminLogout.php"><button class="btn btn-success " type="button"><strong>ADMIN LOGOUT</strong></button></a>
     <br><br>
     ';
}

echo    '

    <!-- Grid container -->
    <div class="container p-4">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-4">
                <h5 class="text-uppercase text-center">Green River College</h5>
                <hr>
                <p class="footer-links">This site provides information and resources
                    for students in Green River\'s Bachelor\'s of
                    Applied Science - Software Development
                    program.</p>
            </div>

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-5">
                <h5 class="text-uppercase mb-0 text-center">Useful Links</h5>
                <hr>
                <ul class="footer-list footer-links">
                    <li>
                        <a class="text-dark" href="https://www.itconnect.greenrivertech.net/internships"
                           target="_blank">Internships</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.itconnect.greenrivertech.net/studentResources"
                           target="_blank">Student Resources</a>
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
                        <a class="text-dark" href="https://www.linkedin.com/school/green-river-community-college/"
                           target="_blank">LinkedIn</a>
                    </li>
                    <li>
                        <a class="text-dark" href="https://www.facebook.com/greenriverdevs/"
                           target="_blank">Facebook</a>
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
                        <a class="text-dark" href="https://www.greenriver.edu/about-us/website/privacy-notice.htm"
                           target="_blank">Privacy Policy</a>
                    </li>
                    <li>
                        <a class="text-dark"
                           href="https://www.greenriver.edu/student-affairs/financial-aid/ethical-principles-and-code-of-conduct.htm"
                           target="_blank">Code of Conduct</a>
                    </li>

                    <li>
                        <a class="text-dark" href="https://gr-guilty-gibbons.greenriverdev.com/admin/adminLogin.php"
                           target="_blank">Admin Panel</a>
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

<!-- Kevins Script Below -->
<script src="scripts/questionButtonAndForm_script.js"></script> ';

if($adminFooter = 'yes')
{
     echo '
     
     <script src="//code.jquery.com/jquery-3.5.1.js"></script>
     <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
     <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

     <script>
         $("#guestbook-entries").DataTable(
             {
                  responsive: true
             }
         );
     
         $(document).ready(function() {
              $(".toast").toast("show");
         });
     </script>
     
     ';
}

echo '

</body>
</html>


';

?>
