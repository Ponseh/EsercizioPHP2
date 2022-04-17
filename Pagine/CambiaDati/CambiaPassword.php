<?php
    session_start();

    require_once('..\..\database\database.php');

    if(isset($_POST['Invia'])) {
        if(password_verify($_POST['Password1'], $_SESSION['Utente_Loggato']['Password'])) {

            $query = "UPDATE tUtenti SET Password = ? WHERE Email = '{$_SESSION['Utente_Loggato']['Email']}'";
            $newPassword = password_hash($_POST['Password2'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $newPassword);

            $stmt->execute();
            $_SESSION['Utente_Loggato']['Password'] = $newPassword;  //Perchè altrimenti nella session rimane il valore vecchio
            header("Location: ..\..\index.html");
        } else {
            //Ha sbagliato la password...
            header("Location: ..\..\Altro\errore.html");
        }
    } else {
        //Non proviene dal form qui sotto...
        header("Location: ..\..\Altro\errore.html");
    }
?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
    <body>
        <form class="" action="" method="post">
            Inserisci la vecchia password
            <input type="password" name="Password1" value=""><br>

            Inserisci la nuova password
            <input type="password" name="Password2" value=""><br>

            <input type="submit" name="Invia" value="Cambia Password">
        </form>
    </body>
</html>
