<?php
// Redirect to script to send email
if (!empty($_POST['email'])) {
    // Sending invitation by email
    header('Location: send_email.php?email='.$_POST['email']);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <title>Invitation soirée MIW</title>
    <style type="text/css">
        .delivery_sent form {
            display: none;
        }
        .delivery_sent div{
            display: initial;
        }
        html{
            height: 100%;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-image: url("img/papaNoel.png");
            background-size: cover;
        }
        div{
            display: none;
            padding: 2rem;
            border: 1px solid #707070;
            border-radius: 32px;
            background-color: #FFFFFF80;
        }
        form{
            width: 100%;
            text-align: center;
            display: flex;
            align-content: center;
            justify-content: center;
            height: 8rem;
            flex-flow: wrap;
        }
        input{
            border-radius: 0.25rem 0 0 0.25rem;
            width: 100%;
            font-size: 20px;
            font-weight: bold;
            padding: 1rem;
            text-align: center;
        }
        button{
            border-radius: 0 0.25rem 0.25rem 0;
            border-width: 0;
            font-size: 30px;
            background-color: #C30078;
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
            width: 100%;
            text-align: center;
        }
        span{
            margin: 0 auto;
            padding-right: 20px;
        }
        form img{
            display: none;
        }
        @media (min-width: 500px) {
            form{
                height: 4rem;
            }
            input{
                width: 40%;
                font-size: 30px;
            }
            img{
                display: initial;
            }
            button{
                width: auto;
            }
        }
    </style>
</head>
<body class="<?= $body_class ?>">
    <form action="#" method="post">
        <input type="email" name="email" placeholder="Ton email de star..." required/>
        <button type="submit"><span>Inscris-toi !</span><img src="img/vip.svg" alt="VIP"></button>
    </form>
    <div><img src="img/mail.svg" alt="Inscription réussie !"></div>
</body>
</html>