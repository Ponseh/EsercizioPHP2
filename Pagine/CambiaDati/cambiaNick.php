<?php
    session_start();

    require_once('..\..\database\database.php');

    if(isset($_POST['Invia'])) {
        if(!strcmp($_POST['Nick1'], $_SESSION['Utente_Loggato']['Nickname'])) {

            $query = "UPDATE tUtenti SET Nickname = ? WHERE Email = '{$_SESSION['Utente_Loggato']['Email']}'";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $_POST['Nick2']);

            $stmt->execute();
            $_SESSION['Utente_Loggato']['Nickname'] = $_POST['Nick2'];  //Perchè altrimenti nella session rimane il valore vecchio
            header("Location: ../../index.html");
        } else {
            //Ha sbagliato il nickname...
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
            Inserisci il vecchio nickname
            <input type="text" name="Nick1" value=""><br>

            Inserisci il nuovo nickname
            <input type="text" name="Nick2" value=""><br>

            <input type="submit" name="Invia" value="Cambia Nickname">
        </form>
    </body>
</html>
