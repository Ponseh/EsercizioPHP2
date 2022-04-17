<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        Benvenuto <?php echo $_SESSION['Utente_Loggato']['Nickname']; ?> nella tua home page!<br>
        Da questa pagina è possibile cambiare i propri dati.<br>
        Cosa si desidera fare?<br>
        <a href="..\CambiaDati\cambiaNick.php">Cambia Nickname</a>
        <a href="..\CambiaDati\CambiaEmail.php">Cambia Email</a>
        <a href="..\CambiaDati\CambiaPassword.php">Cambia Password</a>
    </body>
</html>
