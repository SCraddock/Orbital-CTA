<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*

This is the file to do some small validation and check fields have been submitted.

Once this has been done it sends on the data to the mailer.php to handle the data. so the user doesn't have to wait for the server to process the information (even though it won't take long)

*/

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data




// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors arra
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_FILES);
// // print_r($_FILES['file']['size']);
// // print_r('-----------------------------------------------------------------');
// // print_r($_POST['MAX_FILE_SIZE']);
// echo "</pre>";

// SWAP OUT ISSET POST WITH
// if ($_SERVER['REQUEST_METHOD'] == 'POST')


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Checks to see if a bot has filled in the honeypot
  if(empty($_POST['CarrotStick'])){


     // Sanitise Functions ====================================================
     // Cleans out strings, removing illegal characters
     function sanitiseString($dirty){
       $dirty = filter_var($dirty, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $clean = filter_var($dirty, FILTER_SANITIZE_STRING);
       return $clean;
     }
     // sanitises email address
     function sanitiseEmail($dirty){
       $clean = filter_var($dirty, FILTER_SANITIZE_EMAIL);
       return $clean;
     };
     // sanitises an interger
     function sanitiseNumber($dirty){
       $clean = filter_var($dirty, FILTER_SANITIZE_NUMBER_INT);
       return $clean;
     };

        $frmName = $_POST['frmname'];

        if($frmName == 'formOne'){

          $name =  sanitiseString(trim($_POST['name']));
          $email = sanitiseEmail(trim($_POST['email']));
          $phone = sanitiseNumber(trim($_POST['phone']));
          $brief = array();
          $brief = $_FILES['file'];

          $allowedTypes = array('pdf', 'rtf', 'doc', 'docx');

          // IF EMPTY
          if (empty($name)) {
              $errors['name'] = 'Name is required.';
          }
          if (empty($email)) {
              $errors['email'] = 'Email is required.';
          }
          // If Email valid format
          if(filter_var($email, FILTER_VALIDATE_EMAIL) != true ){
            $errors['email'] = 'Email not valid.';
          }
          if($brief['name'] == ''){
            $errors['upload'] = 'Please Upload your brief';
          }

          if ( $brief['error'] == 2 ) {
            $errors['size'] = 'File too large.';
          }

          $briefType = pathinfo($brief['name'], PATHINFO_EXTENSION); // 'rtf' NO DOT !!!
            if(!in_array($briefType,$allowedTypes) ) {
                    $errors['brief']['name'] = $brief['name'];
                    $errors['brief']['briefType'] = $brief['type'];
                    $errors['brief']['allowedType'] = $allowedTypes;
              }



        } elseif($frmName == 'formTwo'){

          $name = sanitiseString(trim($_POST['name']));
          $email = sanitiseEmail(trim($_POST['email']));
          $phone = sanitiseNumber(trim($_POST['phone']));
          if(isset($_POST['location'])){ $location = $_POST['location']; } else { $location = '';}
          if(isset($_POST['date'])){ $date = $_POST['date']; } else { $date = '';}
          if(isset($_POST['time'])){ $time = $_POST['time']; } else { $time = '';}
          // $date =  sanitiseString(trim($_POST['date']));
          // $time =  sanitiseString(trim($_POST['time']));

          // IF EMPTY
          if (empty($name)) {
              $errors['name'] = 'Name is required.';
          }
          if (empty($email)) {
              $errors['email'] = 'Email is required.';
          }
          // If Email valid format
          if(filter_var($email, FILTER_VALIDATE_EMAIL) != true ){
            $errors['email'] = 'Email not valid.';
          }
          if (empty($location)) {
              $errors['location'] = 'Location is required.';
          }
          if (empty($date)) {
              $errors['date'] = 'Date is required.';
          }
          if (empty($time)) {
              $errors['time'] = 'Time is required.';
          }

        } elseif($frmName == 'formThree'){


          $name = sanitiseString(trim($_POST['name']));
          $email = sanitiseEmail(trim($_POST['email']));
          $phone = sanitiseNumber(trim($_POST['phone']));
          $message = sanitiseString(trim($_POST['message']));
          if(isset($_POST['service'])){ $service = $_POST['service']; } else { $service = '';}
          // $service = $_POST['service'];

          // IF EMPTY
          if (empty($name)) {
              $errors['name'] = 'Name is required.';
          }
          if (empty($email)) {
              $errors['email'] = 'Email is required.';
          }
          // If Email valid format
          if(filter_var($email, FILTER_VALIDATE_EMAIL) != true ){
            $errors['email'] = 'Email not valid.';
          }
          if (empty($message)) {
              $errors['message'] = 'Message is required.';
          }
          if (empty($service)) {
              $errors['service'] = 'a service is required.';
          }

        } else {
          die("Something went wrong if you're here!");
        }

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message
        if($frmName == 'formOne'){

          // Make a unique stamp based off date submitted

          // $fileData = $_FILES['file'];
          $fileData = $_FILES;
          $filePOSTData = $_POST;
          // NOTE: WHOTTON
          // echo "<pre>";
          // print_r($fileData);
          // echo "</pre>";
          // echo "<pre>";
          // print_r($filePOSTData);
          // echo "</pre>";

          // check if save folder exists
          // if it doesnt exisit, make the folder
          if (!file_exists('../briefs/')) {
              mkdir('../briefs/', 0777, true);
          }
          // fopen('../briefs/DotDotBriefs.txt', 'w');

          $stamp = date('dmY--H-i', time()); // 13032017--13-51
          $fileStamp = $stamp . '--';
          $filename = $brief['tmp_name'];

          $currentDIR = __DIR__; // Gets full path to current file
          $path = $currentDIR . '/briefs/'; // __DIR__ doesn't have a trailing slash (unless is root) so we add one
          $path = str_replace('_partials/', '', $path);
          $newName = $fileStamp .  $brief['name'];
          $destination = $path . $newName;

          // $errors['mail']['filename'] = $filename;
          // $errors['mail']['currentDIR'] = $currentDIR;
          // $errors['mail']['path'] = $path;
          // $errors['mail']['newName'] = $newName;
          // $errors['mail']['destination'] = $destination;

          if (move_uploaded_file( $filename , $destination ) == false ){
            die("don't work");
          }

          if(empty($phone) == true ){
            $phone = 'did not provide';
          }

          $to      = 'sam@orbital.vision';
          $subject = 'Have A Project Brief - Upload It Here';
          $emailContent = 'Hello my name is :   ' . $name . "\n\n" . 'My Email is :   ' . $email . "\n\n" . 'My PhoneNumber is :   ' . $phone . "\n\n\n" . 'stamp :   ' . $stamp;
          $headers = 'From: sam@orbital.vision' . "\r\n" .
              'Reply-To: sam@orbital.vision' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();

           mail($to, $subject, $emailContent, $headers);


        } elseif($frmName == 'formTwo'){

          if(empty($phone) == true ){
            $phone = 'did not provide';
          }

          $to      = 'sam@orbital.vision';
          $subject = 'Grab A Coffee - Book A Meeting';
          $emailContent = 'Hello my name is :   ' . $name . "\n\n" . 'My Email is :   ' . $email . "\n\n" . 'My PhoneNumber is :   ' . $phone . "\n\n\n\n" . 'I would like a meeting at (location):   ' . $location . "\n\n" . 'On (date):   ' . $date . "\n\n" . 'at (time) :   ' . $time;
          $headers = 'From: sam@orbital.vision' . "\r\n" .
              'Reply-To: noreply@orbital.vision' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();

          mail($to, $subject, $emailContent, $headers);


        } elseif($frmName == 'formThree'){

          $service = print_r( $service, true );

          if(empty($phone) == true ){
            $phone = 'did not provide';
          }

          $to      = 'sam@orbital.vision';
          $subject = 'I Have A Project - Help Me Plan It';
          $emailContent = 'Hello my name is :   ' . $name . "\n\n" . 'My Email is :   ' . $email . "\n\n" . 'My PhoneNumber is :   ' . $phone . "\n\n" . 'The services required are :   ' . $service . "\n\n" . 'My Message is :   ' . $message;
          $headers = 'From: sam@orbital.vision' . "\r\n" .
              'Reply-To: noreply@orbital.vision' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();

          mail($to, $subject, $emailContent, $headers);


        } else {
          die("Something went wrong if you're here!");
        }



        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';

    }

    // return all our data to an AJAX call
    echo json_encode($data);


  } else {
    die("No Bots!");
  }
} else {
  die("Well this is awkward....");
}





 ?>
