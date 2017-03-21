<?

if ((isset($_POST['username']) && $_POST['username'] != "")
    && (isset($_POST['email']) && $_POST['email'] != "")
    && (isset($_POST['secondName']) && $_POST['secondName'] != "")
    && (isset($_POST['phone']) && $_POST['phone'] != "")
    && (isset($_POST['client-msg-body']) && $_POST['client-msg-body'] != "")
    && (isset($_POST['type-form']) && $_POST['type-form'] != "")

){

    chdir('uploads');


    $today = date("Y-m-d");
    $directoryName = $today;
    if(!is_dir($directoryName)){
        $oldmask = umask(0);
        mkdir($directoryName, 0777);
        chdir($directoryName);

        $userName = $_POST['username'];
        $usersurName = $_POST['secondName'];
        $secondLvlFolder = $userName . ' ' . $usersurName;
        $secondLvlFolder = strtolower($secondLvlFolder);

        if(!is_dir($secondLvlFolder)){

            mkdir($secondLvlFolder, 0777);
            chdir($secondLvlFolder);
            if(isset($_FILES['uploads']['name'])){

                //Getting the total number of files
                $count = count($_FILES['uploads']['name']);
                if(!$count){
                    echo "Upload files.";
                }
                else{

                    // Processing each file iteratively
                    $uploadedfiles = '';
                    for($i=0;$i<$count;$i++){

                        $file_name = $_FILES['uploads']['name'][$i];
                        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                        //Uploading the file
                        $tmp = $_FILES['uploads']['tmp_name'][$i];
                        $target_dir = $secondLvlFolder;
                        $target_file = $file_name;

                        if (move_uploaded_file($tmp, $target_file)){
                            $uploadedfiles .= '<a href="payrollbookstaxes.com/uploads/'.$directoryName.'/'.$secondLvlFolder.'/'.$file_name.'" target="_blank">Click here</a> to view the '.$file_name.' file. <br />';

                        }
                        else {
                            echo "Sorry, there was an error uploading your file";
                        }

                    }

                }

            }

        }else{
            chdir($secondLvlFolder);

            if(isset($_FILES['uploads']['name'])){

                //Getting the total number of files
                $count = count($_FILES['uploads']['name']);
                if(!$count){
                    echo "Upload files.";
                }
                else{

                    // Processing each file iteratively
                    $uploadedfiles = '';
                    for($i=0;$i<$count;$i++){

                        $file_name = $_FILES['uploads']['name'][$i];
                        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                        //Uploading the file
                        $tmp = $_FILES['uploads']['tmp_name'][$i];
                        $target_dir = $secondLvlFolder;
                        $target_file = $file_name;


                        if (move_uploaded_file($tmp, $target_file)){
                            $uploadedfiles .= '<a href="payrollbookstaxes.com/uploads/'.$directoryName.'/'.$secondLvlFolder.'/'.$file_name.'" target="_blank">Click here</a> to view the '.$file_name.' file. <br />';

                        }
                        else {
                            echo "Sorry, there was an error uploading your file";
                        }

                    }

                }

            }
        }

    }else{
        chdir($directoryName);

        $userName = $_POST['username'];
        $usersurName = $_POST['secondName'];
        $secondLvlFolder = $userName . ' ' . $usersurName;
        $secondLvlFolder = strtolower($secondLvlFolder);

        if(!is_dir($secondLvlFolder)){

            mkdir($secondLvlFolder, 0777);
            chdir($secondLvlFolder);
            if(isset($_FILES['uploads']['name'])){

                //Getting the total number of files
                $count = count($_FILES['uploads']['name']);
                if(!$count){
                    echo "Upload files.";
                }
                else{

                    // Processing each file iteratively
                    $uploadedfiles = '';
                    for($i=0;$i<$count;$i++){

                        $file_name = $_FILES['uploads']['name'][$i];
                        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                        //Uploading the file
                        $tmp = $_FILES['uploads']['tmp_name'][$i];
                        $target_dir = $secondLvlFolder;
                        $target_file = $file_name;


                        if (move_uploaded_file($tmp, $target_file)){
                            $uploadedfiles .= '<a href="payrollbookstaxes.com/uploads/'.$directoryName.'/'.$secondLvlFolder.'/'.$file_name.'" target="_blank">Click here</a> to view the '.$file_name.' file. <br />';

                        }
                        else {
                            echo "Sorry, there was an error uploading your file";
                        }

                    }

                }

            }

        }else{
            chdir($secondLvlFolder);
            if(isset($_FILES['uploads']['name'])){

                //Getting the total number of files
                $count = count($_FILES['uploads']['name']);
                if(!$count){
                    echo "Upload files.";
                }
                else{

                    // Processing each file iteratively
                    $uploadedfiles = '';
                    for($i=0;$i<$count;$i++){

                        $file_name = $_FILES['uploads']['name'][$i];
                        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                        //Uploading the file
                        $tmp = $_FILES['uploads']['tmp_name'][$i];
                        $target_dir = $secondLvlFolder;
                        $target_file = $file_name;


                        if (move_uploaded_file($tmp, $target_file)){
                            $uploadedfiles .= '<a href="payrollbookstaxes.com/uploads/'.$directoryName.'/'.$secondLvlFolder.'/'.$file_name.'" target="_blank">Click here</a> to view the '.$file_name.' file. <br />';
                        }
                        else {
                            echo "Sorry, there was an error uploading your file";
                        }

                    }

                }

            }
        }
    }


    $username = $_POST['username'];
    $username = ucwords($secondLvlFolder);


    $to = 'yarikT94@gmail.com';
    $subject = 'New uploaded files from ' . $_POST['type-form'] . ' page';
    $message = '
                      <html>
                          <head>
                              <title>' . $subject . '</title>
                          </head>
                          <body>                       
                              <p>From: ' . $username . '</p>
                              <p>Email: ' . $_POST['email'] . '</p>
                              <p>Phone: ' . $_POST['phone'] . '</p>
                              <p>Comments & Instructions: ' . $_POST['client-msg-body'] . '</p>
                              <p>Uploaded files: <br /> ' . $uploadedfiles . '</p> 
                          </body>
                      </html>';


    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Payrollbookstaxes.com  <from@payrollbookstaxes>\r\n";
    mail($to, $subject, $message, $headers);

}






?>