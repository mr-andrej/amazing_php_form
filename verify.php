<?php
    $emptyField = false;

    if (empty($_POST["firstname"])) {
        $emptyField = true;
        $firstnameErr = "00 - Firstname is a required field";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["firstname"])) // Searches for passed terms, returns true/false
        $firstnameErr = "01 - Only letters and white space allowed";
    else
        $firstname = $_POST["name"];

    if (empty($_POST["lastname"])) {
        $emptyField = true;
        $lastnameErr = "00 - Lastname is a required field";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["lastname"])) // Searches for passed terms, returns true/false
        $lastnameErr = "01 - Only letters and white space allowed";
    else
        $lastname = $_POST["lastname"];

    if (empty($_POST['email'])) {
        $emptyField = true;
        $emailErr = "00 - Email is a required field";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        $emailErr = "02 - Invalid email format";
    else
        $email = $_POST['email'];

    if (empty($_POST['tel'])) {
        $emptyField = true;
        $telErr = "00 - Phone number is a required field";
    } else
        $tel = $_POST['tel'];

    if (empty($_POST['message'])) {
        $emptyField = true;
        $messageErr = "00 - Message is a required field";
    } else
        $message = $_POST['message'];


// false = all fields fulfilled / true = there is an empty field

