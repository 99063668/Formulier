<?php
    $Message = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Message = "Uw gegevens zijn verzonden. U wordt doorverwezen naar de vorige pagina.";

        $Name = $_POST["Fullname"];
        $Email = $_POST["Email"];
    }
?>



<!DOCTYPE html>
<html lang="nl">
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <title>Formulier</title>
   <link rel="stylesheet" type="text/css" href="formulier.css">
</head>
<body>

<main>
    <?php
        if(!$Message){
    ?>
    <p> Vul hier uw contact gegevens in: </p>
    <form action="" method="POST">
        <input type="text" name="Fullname" placeholder="Vul hier uw volledige naam in">
        <input type="email" name="Email" placeholder="Vul hier uw email-adres in">
        <button name="SubmitBtn">Verzend gegevens</button>
    </form>

    <?php
        }else{
            ?>
            <h1 id="Message"> De ingevulde gegevens zijn:</h1>
            <p><b>Naam:</b> <?php echo $Name; ?></p>
            <p><b>E-mail:</b> <?php echo $Email; ?></p>
            <p id="Message"><?php echo $Message; ?></p>

            <script>
                var Message = document.getElementById("Message");
                setTimeout(function(){
                    window.location = "contact.php";
                }, 3000);
            </script>
    <?php
        }
    ?>
</main>

   
 </body>
</html>