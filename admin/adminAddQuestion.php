<?php
session_set_cookie_params(0);
session_start();
// TURN ON ERROR REPORTING
ini_set('display_errors', 1);
error_reporting(E_ALL);


if(!isset($_SESSION['grguiltyuse'])) // If session is not set then redirect to Login Page
{
    header("Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminLogin.php");
    exit();
}

$adminFooter = 'yes';

//answerTextArea
//questionTextBox
//categorySelect
$answerTextAreaErr = "";
$questionTextBoxErr = "";
$categorySelectErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if ($_POST["categorySelect"]=="") {
        $categorySelectErr = "Select a category.";
    }

    if (empty($_POST["questionTextBox"])) {
        $questionTextBoxErr = "Please enter a question.";
    }

    if (empty($_POST["answerTextArea"])) {
        $answerTextAreaErr = "Please enter an answer.";
    }


    if ($categorySelectErr == "" && $questionTextBoxErr=="" && $answerTextAreaErr=="") {
        //if form is valid, connect to db and add question
        require("/home/grguilty/qandaconfig.php");

        $answerInsert = '<p class="answer">' . "$_POST[answerTextArea]" . '</p>';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO qna (question, answer, category_id)
        VALUES ('$_POST[questionTextBox]', '$answerInsert', '$_POST[categorySelect]')";
        if ($conn->query($sql) === TRUE) {
//            echo "New record created successfully";
        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        //db conn ended here

        header('Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminPanel.php');
        exit();
    }
}
?>
    <!--
        Gr-Guilty-Gibbons FAQ
        Kevin, Conor, Pat
        SDEV 305 2021
        adminAddQuestion.php
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
            <img src="../images/siteGRGGrivShift2.svg" alt="GRTech Logo"  width="200"  class="d-inline-block align-text-top">
        </a>

        <ul class="list-unstyled d-block d-lg-none d-xl-none d-xxl-none pt-4">
            <li>
                <h3 >GRC Soft Dev Program</h3>
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
        <form id="search-mobile-nudge" class="px-md-2  px-lg-2 px-xl-2 py-sm-2 py-xs-2 mt-3" action="../index.php" method="post">
            <div class="input-group mb-3">
                <button type="submit" class="input-group-text btn-success" > Back to FAQ</button>
            </div>
        </form>

    </div>
</nav>
<!--Nav ends here-->

<?php

require("/home/grguilty/qandaconfig.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT category_id, category_name 
FROM category";
$result = $conn->query($sql);

$categoryArray = array();
$toBeEchoed = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $toBeEchoed.= '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
    }
}

$conn->close();
?>

<!-- Control Panel Content Here -->

<!-- content container -->
<form id="guestbook-form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <fieldset>
        <div class="form-group">

<!--            Category Selection-->
            <label for="categorySelect">Add to FAQ category</label>
            <span class="error"> <?php echo $categorySelectErr;?></span>
            <select class="form-select" aria-label="Default select example" id="categorySelect" name="categorySelect">
                <option value="none" disabled selected>Select category</option>
                <?php echo $toBeEchoed?>
            </select>
        </div>

        <div class="form-group">
            <label for="questionTextBox" class="form-label">Add a Question</label>
            <span class="error"> <?php echo $questionTextBoxErr;?></span>
            <input type="text" class="form-control" id="questionTextBox" placeholder="Enter question text here" name="questionTextBox">
        </div>

        <div class="form-group">
            <label for="answerTextArea" class="form-label">Add an Answer</label>
            <span class="error"> <?php echo $answerTextAreaErr;?></span>
            <textarea class="form-control" id="answerTextArea" rows="3" placeholder="Enter answer text here" name="answerTextArea"></textarea>
        </div>

    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!--end content container-->


<?php
include('../include/includeFooter.php');
?>