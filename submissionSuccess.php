<!--
    Gr-Guilty-Gibbons FAQ
    Kevin, Conor, Pat
    SDEV 305 2021
    searchResults.php
-->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>success</title>

    </head>

    <body id="iframe-cont" style="display:flex;justify-content:center;align-items:center;overflow:hidden;display:flex;justify-content:center;font-family:arial;font-size:16px;font-weight:400;">

        <div id="display" style="position:absolute;top:0.5px;width:300px;margin:0;padding:0;overflow:hidden;display:flex;justify-content:center;user-select:none;">
            Processing your question...
        </div>

        <?php
        error_reporting(0);

        /////////////////////////////////////////////////////////////////////
        // validating form fields
        /////////////////////////////////////////////////////////////////////

        /*
        * form removes '../' patterns and replaces ';' with ':'
        * $string is input to be cleaned
        */
        function removeHackyStuff($string) {
            // removing ';' and replacing with ':'
            for ($i = 0; $i < strlen($string); $i++) {
                // removing ';' and replacing with ':'
                if ($string[$i] == ';') {
                    $string[$i] = ':';
                }
                // removing '../'
                if ($i < strlen($string) - 2) {
                    if ($string[$i] == "." && $string[$i+1] == "." && $string[$i+2] == "/") {
                        $string[$i] = "*";
                        $string[$i+1] = "*";
                        $string[$i+2] = "*";
                    }
                }
            }
            return $string;
        }

        /*
        * cleans and prepares a string from a form input for database
        * $str is string from a user input
        */
        function clean($str) {
            // needed to get charset of connection for mysqli_real...
            global $cnxn;
            $str = removeHackyStuff($str);
            return mysqli_real_escape_string($cnxn, $str);
        }


        function emailValidation($str) {

            if ($str == "") {
                return false;
            } else {
                // counters and 'last index' indicators
                // for '@' and '.' chars
                $ats_cntr = 0;
                $dots_cntr = 0;
                $ats_lasti = -1;
                $dots_lasti = -1;

                $is_valid = true;

                // count occurances of '.' and '@', find last index of each
                for ($i = 0; $i < strlen($str); $i++) {
                    // count them up
                    if ($str[$i] == "@") {
                        $ats_cntr++;
                        $ats_lasti = $i;
                    }
                    if ($str[$i] == ".") {
                        $dots_cntr++;
                        $dots_lasti = $i;
                    }
                    // find if two in a row of either exist
                    if ($i <= strlen($str) - 2) {
                        if (($str[$i] == '@' and $str[$i+1] == '@') || ($str[$i] == '.' and $str[$i+1] == '.')) {
                            $is_valid = false;
                        }
                    }
                }
                // '.' or '@' at beginning or end is invalid
                if ($str[0] == '@' || $str[strlen($str)-1] == '@' || $str[0] == '.' || $str[strlen($str)-1] == '.') {
                    $is_valid = false;
                }
                // last '.' must occur after last '@'
                // '@' and '.' can't be immediately adjacent
                if ($ats_lasti > $dots_lasti || $dots_lasti - $ats_lasti == 1 ) {
                    $is_valid = false;
                }
                if ($ats_cntr == 0 || $dots_cntr == 0) {
                    $is_valid = false;
                }
                return $is_valid;
            }
        }

        //////////////////////////////////////////////////////////////////////
        // server database
        require("/home/grguilty/configs.php");
        $cnxn = mysqli_connect($db_host, $db_user, $db_password, $db_database); //////////////////////////////////
        //////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////////////////////////////
        // server database 2
        // require("/home/grguilty/db-creds.php");
        // $cnxn = mysqli_connect($host, $username, $password, $database); //////////////////////////////////
        //////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////////////////////////////
        // local database
        // require("../local_db_creds.php");
        // $cnxn = mysqli_connect($host, $user, $password, $database); //////////////////////////////////
        //////////////////////////////////////////////////////////////////////

        ///////////////////////////////////////////////////////////////////////
        // validation flag
        $form_valid = true;
        $error_message = "<script>document.getElementById('display').innerText = 'Error: ";
                          // longest possible error:
                          // Error: question, first name, email required
        $success_message = "<script>
                            document.getElementById('display').innerText = 'Your question was submitted';
                            </script>";

        ///////////////////////////////////////////////////////////////////////
        // use this to accumulate error text
        $errors = array();
        $errors_end = " required';</script>";

        ///////////////////////////////////////////////////////////////////////
        // validate keys
        $correct_keys = " question fName lName email ";
        $post_keys = array_keys($_POST);
        for ($i = 0; $i < sizeof($post_keys); $i++) {
            //echo $post_keys[$i];
            //echo $post_keys[$i];
            if (strpos($correct_keys, $post_keys[$i]) == false) {
                $form_valid = false;
            }
        }

        /////////////////////////////////////////////////////////////////////
        // check referring url
        if (array_key_exists("HTTP_REFERER", $_SERVER)) {
            if ($_SERVER["HTTP_REFERER"] != "https://gr-guilty-gibbons.greenriverdev.com/") {
            // if ($_SERVER["HTTP_REFERER"] != "http://localhost:8000/") {
                $isValid = false;
            }
        } else {
            $isValid = false;
        }

        /////////////////////////////////////////////////////////////////////
        // if keys are correct, validate rest of form
        if ($form_valid) {

            /////////////////////////////////////
            // validate question, first name and email
            if($_POST['question'] == "") {
                $form_valid = false;
                array_push($errors, "question");
            }
            if($_POST['fName'] == "") {
                $form_valid = false;
                if (count($errors) > 0){
                    array_push($errors, ", ");
                }
                array_push($errors, "first name");
            }
            if(!emailValidation($_POST['email'])) {
                $form_valid = false;
                if (count($errors) > 0){
                    array_push($errors, ", ");
                }
                array_push($errors, "email");
            }


            //////////////////////////////////////////////////////////////////////////
            // combine errors
            foreach ($errors as $item){
                $error_message = $error_message . $item;
            }
            $error_message = $error_message . " required';</script>";

            //$form_valid = false;
            if ($form_valid) {
                //////////////////////////////////////////////////////////////////////
                // grab and clean all inputs for sql
                $fname = clean($_POST['fName']);
                $lname = clean($_POST['lName']);
                $email = clean($_POST['email']);
                $question = clean($_POST['question']);

                $sql = "INSERT INTO client_questions (fname, lname, email, question)
                        VALUES ('$fname', '$lname', '$email', '$question');";
                # echo $sql;
                # update database
                mysqli_query($cnxn, $sql); ////////////////////////////////////////////////////////////////////////////////



                /////////////////////////////////////////////////////////////////////
                // setting up things needed to send the email to the admin
                /////////////////////////////////////////////////////////////////////
                // send imap_getmailboxes
                $toEmail = "price.kevin@student.greenriver.edu";
                $fromName = $_POST["fName"]; // $to would be the admin, $from would be a form variable from the submit form
                $fromEmail = $_POST["email"]; //this will be from the faq form
                $subject = "Question from FAQ Page";
                $headers = "From: $fromName <$fromEmail>";
                $message = $_POST["question"];

                ///////////////////////////////////////////////////////////////////
                // this sends the email
                $success = true;
                //$success = mail($toEmail, $subject, $message, $headers); ////////////////////////////////////// commented out for debugging

                if (!$success && !$sql) {
                    echo $error_message;
                } else {
                    echo $success_message;
                }
                ////////////////////////////////////////////////////////////////
            } else {
                echo $error_message;
            }

        } else {
            $error_message = $error_message . " form tampering';</script>";
            echo $error_message;
        }

        ?>
        <!-- <h1>Form submission was successful</h1> -->
    </body>
</html>
