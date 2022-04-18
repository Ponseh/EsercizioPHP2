<?php
    session_start();

    require_once('../../database/database.php');

    $banned = !$_SESSION['Utente_Loggato']['Bannato'];

    $conn->query("UPDATE tUtenti SET Bannato = {$banned} WHERE Nickname = '{$_SESSION['Utente_Loggato']['Nickname']}'");

    header("Location: ../Amministratore/amministratore.php");
?>
