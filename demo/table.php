<?php
include "test.php";
$conn = OpenCon();

$sql = "SELECT * FROM `test`";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TablePage</title>
    <style>
        table,th,td{
            border: 2px solid;
        }

        th{
            background-color: gray;
            color: white;
            border-color: black;
        }
        button.modify{
            background-color: yellow;
        }
        button.delete{
            background-color: red;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Email</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Password</th>
        </tr>
<?php
if($result->num_rows != null )
{
    
    while($row = $result->fetch_assoc()) // questo è come si integra un file "dinamico" come grandezza
    {
        // prendo variabile espongo variabile
        $email = $row["email"];
        $name = $row["name"];
        $surname = $row["surname"];
        $password = $row["password"];
        echo "<tr>";
        echo "<td>" . $email . "</td>"; 
        echo "<td>" . $name . "</td>";
        echo "<td>" . $surname . "</td>";
        echo "<td>" . $password . "</td>";
        if($row["email"] != null)
        {
        echo "
        <td>
            <form action=\"/demo/modify/modify.php\" method=\"GET\">
                <input type=\"hidden\" value=\"" . $email .  "\" name=\"email\">
                <button class=\"modify\" type=\"submit\">Modifica</button>
            </form>
        </td>";
        echo "
        <td>
            <form action=\"/demo/delete/deleteData.php\" method=\"GET\">
                <input type=\"hidden\" value=\"" . $email .  "\" name=\"email\">
                <button class=\"delete\" type=\"submit\">Elimina</button>
            </form>
        </td>";
        }
        echo "</tr>";
    }
}else
{
    echo "0 risultati o errore";
}
?>
    </table>
</body>
</html>
<?php

CloseCon($conn);
?>