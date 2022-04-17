<?php
    session_start();

    require_once('..\database\database.php');

    if(isset($_POST['InviaEmail'])) {
        $stmt = $conn->prepare('SELECT * FROM tUtenti WHERE Email=?');
        $stmt->bind_param("s", $_POST['Email']);

    } else if(isset($_POST['InviaNick'])) {
        $stmt = $conn->prepare('SELECT * FROM tUtenti WHERE Nickname=?');
        $stmt->bind_param("s", $_POST['Nickname']);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $arrayRes = $result->fetch_assoc();

    if(password_verify($_POST['Password'], $arrayRes['Password'])) {
        $_SESSION['Utente_Loggato'] = $arrayRes;

        if($arrayRes['Bannato']) {
            header("Location: ../Pagine/Bannato/bannato.html");

        } else if ($arrayRes['Amministratore']) {
            header("Location: ../Pagine/Amministratore/amministratore.php");

        } else {
            header("Location: ../Pagine/Utente/utente.php");
        }
    } else {
        //ha sbagliato la password...
        header("Location: ../index.html");
    }
?>
