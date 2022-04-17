<?php
    session_start();

    require_once('..\..\database\database.php');

    if(isset($_POST['Invia'])) {
        if(!strcmp($_POST['Email1'], $_SESSION['Utente_Loggato']['Email'])) {

            $query = "UPDATE tUtenti SET Email = ? WHERE Nickname = '{$_SESSION['Utente_Loggato']['Nickname']}'";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $_POST['Email2']);

            $stmt->execute();
            $_SESSION['Utente_Loggato']['Email'] = $_POST['Email2'];  //Perchè altrimenti nella session rimane il valore vecchio
            header("Location: ../../index.html");
        } else {
            //Ha sbagliato l'email...
            header("Location: ../../Altro/errore.html");
        }
    } else {
        //Non proviene dal form qui sotto...
        header("Location: ../../Altro/errore.html");
    }
?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
    <body>
        <form class="" action="" method="post">
            Inserisci la vecchia mail
            <input type="email" name="Email1" value=""><br>

            Inserisci la nuova mail
            <input type="email" name="Email2" value=""><br>

            <input type="submit" name="Invia" value="Cambia Email">
        </form>
    </body>
</html>
