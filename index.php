<?php

// Redirect to script to send email
if (!empty($_POST['email'])) {

    // Sending invitation by email
    header('Location: send_email.php');
    exit;

}

$body_class = "";

// Display delivery status, (tips anti-refreshing) 
if (!empty($_GET['delivery']) and $_GET['delivery'] === "sent") {

    // Sending invitation by email
    // echo "OK c'est envoyé..";
    $body_class = "delivery_sent";
}



?><!DOCTYPE html>
<html lang="fr">

<head>
    
    <title></title>

    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }

        .none {
            display: none;
        }

        .delivery_sent {
            display: initial;
            background-color: rgba(220,220,220, 0.5);
            border: solid black 1px;
            border-radius: 15px;
            padding: 50px 80px;
            width: 250px;
        }

        .delivery_sent img{
            width: 100%;
        }

        body {
            background-image: url("img/pere_noel.png");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 97vh;
        }

        form{
            display: flex;
            justify-content: center;
        }

        #submit{
            width: 295px;
            height: 100%;
            border: none;
            background-color: #C30078;
            color: white;
            padding: 0 15px;
            border-radius: 0 10px 10px 0;
            font-size: 38px;
            margin-left: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #submit:hover{
            cursor: pointer;
        }

        #input_mail{
            padding: 15px;
            font-size: 45px;
        }
        #submit:active form{
            display: none;
        }

    </style>

</head>
    <body>

    <form action="send_email.php"   style="<?php  echo isset($_REQUEST['delivery'])? 'display:none;': ''?>" method="post">
        <span><input id="input_mail" type="email" name="email" placeholder="Ton email de star..." required/></span>
        <span><button id="submit" type="submit"> Inscris-toi ! <img  width="20%" src="img/vip.svg" alt="ticket_vip"></button></span>
    </form>

    <div class="none <?= $body_class ?>"><img src="img/mail.svg"   alt="message envoyé"></div>
<div>lorem45 </div>
    </body>
</html>