<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>success</title>
    </head>
    <body>

        <?php
        // send imap_getmailboxes
        $toEmail = "Obrien.Conor@student.greenriver.edu";
        $fromName = $_POST["fName"]; // $to would be the admin, $from would be a form variable from the submit form
        $fromEmail = $_POST["email"]; //this will be from the faq form
        $subject = "Question from FAQ Page";
        $headers = "From: $fromName <$fromEmail>";
        $message = $_POST["question"];

        ///////////////////////////////////////////////////////////////////
        // this sends the email
        $success = mail($toEmail, $subject, $message, $headers);
        if (!$success) {
            echo "<p>email NOT sent!</p>";
        } else {
            echo "email was sent";
        }
        ////////////////////////////////////////////////////////////////
        ?>
        <!-- <h1>Form submission was successful</h1> -->

    </body>
</html>
