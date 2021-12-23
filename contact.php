<?php

session_start();

// initializing variables


// connect to the database
$db = mysqli_connect('localhost', 'root', 'yrs@1234', 'facebookpostsystem');

// REGISTER USER
if (isset($_POST['submit2'])) {
    // receive all input values from the form
    $firstname = mysqli_real_escape_string($db, $_REQUEST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_REQUEST['lastname']);
    $email = mysqli_real_escape_string($db, $_REQUEST['email']);
    $message = mysqli_real_escape_string($db, $_REQUEST['message']);
    $sql = "INSERT INTO contact(firstname,lastname, email,message,id) VALUES ('$firstname', '$lastname', '$email','$message',default)";
    if(mysqli_query($db, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }




    // Finally, register user if there are no errors in the form

}
