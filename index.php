<?php
// Boilerplate for exercice DAY 3 at university MIW 05
// Code is bad and poor... but just enough for skills students :-) 

// Redirect to script to send email
if (!empty($_POST['email'])) {

    // Sending invitation by email
    header('Location: send_email.php?email=' . $_POST['email']);
    exit;
}

$body_class = "";

// Display delivery status, (tips anti-refreshing) 
if (!empty($_GET['delivery']) and $_GET['delivery'] === "sent") {
    $body_class = "delivery_sent";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscris toi à la meilleure soirée !">
    <link rel="stylesheet" href="css/style.css">
    <title>Modèle invitation email</title>

</head>

<body class="<?= $body_class ?>">
    <div class="container">
        <form action="send_email.php" method="post">
            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="Ton email de star..." required />
            <button class="btnSubmit">Inscris-toi !<i class="icon-emailVip"></i></button>
        </form>
        <div class="messageSend">
            <i class="icon-emailSend"></i>
        </div>

    </div>



</body>

</html>