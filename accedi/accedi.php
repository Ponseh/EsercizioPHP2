<?php
    require_once('..\database\database.php');

    $stmt = $conn->prepare('SELECT * FROM tUtenti WHERE Nickname=?');
    $stmt->bind_param("s", $_POST['Utente']);
    $stmt->execute();
    $result = $stmt->get_result();

    $arrayRes = $result->fetch_assoc();

    //if(password_verify($_POST['Password'], $arrayRes['Password'])) {
        if()
    //}
    print_r($arrayRes);
?>
