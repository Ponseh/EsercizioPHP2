<?php
    session_start();

    require_once('../../database/database.php');

    $banned = ($_GET['bannato'] == 1) ? 0 : 1;

    $conn->query("UPDATE tUtenti SET Bannato = {$banned} WHERE Nickname = '{$_GET['nick']}'");

    header("Location: ../Amministratore/amministratore.php");
?>
