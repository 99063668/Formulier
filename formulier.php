<?php
/*$Message = false;*/
$nameErr = $emailErr = "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Naam is verplicht";
  } else {
    $name = input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Alleen letters en spaties zijn toegestaan";
    }
  }
}
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is verplicht";
  } else {
    $email = input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Ongeldig email adres";
    }
  }
 
  /*$Message = "Uw gegevens zijn verzonden. U wordt doorverwezen naar de volgende pagina."*/

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <title>formulier</title>
   <link rel="stylesheet" type="text/css" href="formulier.css">
</head>
<body>


    <h2>Vul hier uw gegevens in:</h2>
    <p><span class="error">* Verplichte velden</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <p>Naam: <input type="text" name="name" value="<?php echo $name;?>" placeholder="Vul hier uw volledige naam in">  <span class="error">* <?php echo $nameErr;?></span></p>
    <p>E-mail: <input type="text" name="email" value="<?php echo $email;?>" placeholder="Vul hier uw email adres in"><span class="error">* <?php echo $emailErr;?></span></p>
    <button name="SubmitBtn">Verzend gegevens</button>
    </form>


    <!--<h1 id="Message"> <?php echo "<h2>Uw invoer:</h2>"?>;</h1>-->
    <p><b>Naam: </b><?php echo $name; ?></p>
    <p><b>Email: </b> <?php echo $email;?></p>
    
<script>
   /* var Message = document.getElementById("Message");
    setTimeout(function(){
        window.location = "contact.php";
    }, 3000);*/
</script>


</body>
</html>