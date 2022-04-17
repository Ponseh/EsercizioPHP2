<?php
    require_once('..\database\database.php');

    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare('INSERT INTO tutenti(Nome, Cognome, Nickname, Email, Password, Amministratore, Bannato) VALUES (?, ?, ?, ?, ?, 0, 0)');
    $stmt->bind_param("sssss", $_POST['Nome'], $_POST['Cognome'], $_POST['Nickname'], $_POST['Email'], $password);
    $stmt->execute();

    header("Location: ../index.html");
?>
