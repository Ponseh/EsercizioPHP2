<?php
    session_start();
    require_once('../../database/database.php');
 ?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8">
    </head>
    <style media="screen">
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width:60%;
        table-layout:fixed;
        word-wrap:break-word; /* va a capo quando serve (utile) */
    }
    </style>
    <body>
        Benvenuto amministratore <?php echo $_SESSION['Utente_Loggato']['Nickname']; ?> nella tua home page!<br>
        Come amministratore, vengono visualizzati tutti gli utenti che hanno effettuato la registrazione al sito.<br>

        <table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Nickname</th>
                <th>Email</th>
                <th>Amministratore</th>
                <th>Bannato</th>
                <th>Password</th>
            </tr>
            <?php
                $result = $conn->query("SELECT Nome, Cognome, Nickname, Email, Amministratore, Bannato from tutenti");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if(strcmp($row['Nickname'], $_SESSION['Utente_Loggato']['Nickname']) != 0) { //Per non mostrare se stesso
                            echo "<tr>";
                                echo "<td>{$row['Nome']}</td>";
                                echo "<td>{$row['Cognome']}</td>";
                                echo "<td>{$row['Nickname']}</td>";
                                echo "<td>{$row['Email']}</td>";
                                echo "<td>";
                                echo $row['Amministratore'] ? "Sì" : "No";
                                echo "</td>";
                                echo "<td>";
                                echo $row['Bannato'] ? "<a href='../CambiaDati/bannaOSbanna.php?nick={$row['Nickname']}&bannato={$row['Bannato']}'>Sì</a>" : "<a href='../CambiaDati/bannaOSbanna.php?nick={$row['Nickname']}&bannato={$row['Bannato']}'>No</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "Cambia password";
                                echo "</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    //Non ci sono utenti (impossibile che accada, tuttavia...)
                    echo "0 results";
                }
            ?>
        </table>

        <br><br>
        
        <a href="../../Altro/logout.php">Esegui il logout</a>
    </body>
</html>
