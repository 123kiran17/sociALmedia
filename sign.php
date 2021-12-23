<?php
session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'yrs@1234', 'facebookpostsystem');

// REGISTER USER
if (isset($_POST['submit'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['E_mail']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR E_mail='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);


    $emailCheck = $db->query($user_check_query);
    $rowCount = $emailCheck->fetch_row();

    // PHP validation
    if (!empty($_POST['username'])  && !empty($_POST['E_mail']) && !empty($_POST['password'])) {

        // check if user email already exist
        if ($rowCount > 0) {
            echo " Username or Email Already Exist";
        } else {
            $query = "INSERT INTO  users(username, E_mail, password) 
  			  VALUES('$username','$email', '$password_1')";
            mysqli_query($db, $query);
            header("location: index.html");
        }


    }
    // Finally, register user if there are no errors in the form

}


