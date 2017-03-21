<?

if ((isset($_POST['username']) && $_POST['username'] != "")
    && (isset($_POST['email']) && $_POST['email'] != "")
    && (isset($_POST['subject']) && $_POST['subject'] != "")
    && (isset($_POST['email-body']) && $_POST['email-body'] != "")
    && (isset($_POST['feedback']))

) {
    $formtype = $_POST['feedback'];
    $formtype = strtoupper($formtype);
    $username = $_POST['username'];
    $username = ucfirst($username);

    $to = 'yarikT94@gmail.com';
    $subject = 'New feedback message from ' . $formtype . ' page';
    $message = '
                      <html>
                          <head>
                              <title>' . $subject . '</title>
                          </head>
                          <body>
                              <p>Feedback subject: ' . $_POST['subject'] . '</p>
                              <p>From: ' . $username . '</p>
                              <p>Email: ' . $_POST['email'] . '</p>
                              <p>Message: ' . $_POST['email-body'] . '</p>                                                                                   
                          </body>
                      </html>';


    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Payrollbookstaxes.com  <from@payrollbookstaxes>\r\n";
    mail($to, $subject, $message, $headers);

}

?>