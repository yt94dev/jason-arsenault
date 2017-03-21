<?

if ((isset($_POST['username']) && $_POST['username'] != "")
    && (isset($_POST['email']) && $_POST['email'] != "")
    && (isset($_POST['phoneNum']) && $_POST['phoneNum'] != "")
    && (isset($_POST['businessName']) && $_POST['businessName'] != "")
    && (isset($_POST['businessType']) && $_POST['businessType'] != "")
    && (isset($_POST['emplNumber']) && $_POST['emplNumber'] != "")
    && (isset($_POST['pricePlanType']))

) {
    $features = '';
    if (empty($_POST['featuresPlanSet'])) {
        $features = "When submitting a form  ".$_POST['username']." deselected all features.";
    } else {
        $features = implode(', ', $_POST['featuresPlanSet']);
    }

    $username = $_POST['username'];
    $username = ucfirst($username);

    $businessName = $_POST['businessName'];
    $businessName = strtoupper($businessName);

    $businessType = $_POST['businessType'];
    $businessType = strtoupper($businessType);

    $pricePlanType = $_POST['pricePlanType'];
    $pricePlanType = strtoupper($pricePlanType);

    $to = 'yarikT94@gmail.com';
    $subject = 'New subscribe for ' . $_POST['pricePlanType'] . ' pricing plan'; //Загаловок сообщения
    $message = '
                      <html>
                          <head>
                              <title>' . $subject . '</title>
                          </head>
                          <body>
                              <p>Name: ' . $username . '</p>
                              <p>E-mail: ' . $_POST['email'] . '</p>
                              <p>Phone: ' . $_POST['phoneNum'] . '</p>
                              <p>Business name: ' . $businessName . '</p>
                              <p>Business type: ' . $businessType . '</p>
                              <p>Number of Employees: ' . $_POST['emplNumber'] . '</p>
                              <p>Price plan type: ' . $pricePlanType . '</p>
                              <p>Pricing plan features: ' . $features .'</p>                                                        
                          </body>
                      </html>';


    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Payrollbookstaxes.com <from@payrollbookstaxes>\r\n";
    mail($to, $subject, $message, $headers);

}

?>