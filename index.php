<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Hello Wilder</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
<?php
function thankYou() {
    echo 'Merci ' . $_POST["firstname"] . ' ' . $_POST["lastname"] . ' de nous avoir
contacté à propos de "' . $_POST["subject"] . '".' . "<br><br>";

    echo 'Un de nos conseiller vous contactera soit à l’adresse ' . $_POST['email'] .
        ' ou par téléphone au ' . $_POST["tel"] . ' dans les plus brefs délais pour
traiter votre demande :' . "<br><br>";

    echo $_POST["message"];
}

$firstnameErr = $lastnameErr = $emailErr = $telErr = $messageErr = "";
$firstname = $lastname = $email = $tel = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emptyField = false;

    if (empty($_POST["firstname"])) {
        $emptyField = true;
        $firstnameErr = "Firstname is a required field";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["firstname"])) // Searches for passed terms, returns true/false
        $firstnameErr = "Only letters and white space allowed";
    else
        $firstname = $_POST["firstname"];

    if (empty($_POST["lastname"])) {
        $emptyField = true;
        $lastnameErr = "Lastname is a required field";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["lastname"])) // Searches for passed terms, returns true/false
        $lastnameErr = "Only letters and white space allowed";
    else
        $lastname = $_POST["lastname"];

    if (empty($_POST['email'])) {
        $emptyField = true;
        $emailErr = "Email is a required field";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        $emailErr = "Invalid email format";
    else
        $email = $_POST['email'];

    if (empty($_POST['tel'])) {
        $emptyField = true;
        $telErr = "Phone number is a required field";
    } else
        $tel = $_POST['tel'];

    if (empty($_POST['message'])) {
        $emptyField = true;
        $messageErr = "Message is a required field";
    } else
        $message = $_POST['message'];
    if ($emptyField === false)
        thankYou();
}
?>
<h1>Form for 1.2</h1>
<p><span class="error">* denotes a required field</span></p>
<form action="" method="POST">
    <label for="firstname">Firstname: </label>
    <input type="text" name="firstname">
    <span class="error">* <?php echo $firstnameErr; ?></span>

    <br><br>

    <label for="lastname">Lastname: </label>
    <input type="text" name="lastname">
    <span class="error">* <?php echo $lastnameErr; ?></span>

    <br><br>

    <label for="email">Email: </label>
    <input type="text" name="email">
    <span class="error">* <?php echo $emailErr; ?></span>

    <br><br>

    <label for="tel">Phone number:</label>
    <input type="tel" name="tel">
    <span class="error">* <?php echo $telErr; ?></span>

    <br><br>

    <label for="dropdown">Subject: </label>
    <select name="subject">
        <option value="This is an amazing first choice">This is an amazing first choice</option>
        <option value="This is an alright second choice">This is an alright second choice</option>
        <option value="This is an acceptable third choice">This is an acceptable third choice</option>
    </select>
    <br><br>
    <label for="message">Message: </label>
    <textarea name="message" rows="4" cols="20"></textarea>
    <span class="error">* <?php echo $messageErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
