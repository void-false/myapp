<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <title>Shopping App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
    <p><a href="bookapplite.php">Food</a> | <a href="organic.php">Organic</a> | <a href="cash.php">Cash</a> | <a href="misc.php">Магаз</a> | <a id="activeTab" href="cat0.php">Cat0</a></p>
    <div id="addItemForm">
        <form method="post">

        <label for="name">Add an item: </label>
        <input name="name" type="text" value="" autofocus>

        <input name="addBook" type="submit" value="Add">

        </form>
    </div>

    <?php
        if(isset($_SESSION['id'])) {
            
            $db = new PDO("sqlite:../../data/bookapplite.sqlite");

            $db->exec("CREATE TABLE IF NOT EXISTS cat0(id INTEGER PRIMARY KEY, name TEXT)");

            if(isset($_POST['removeID'])) {
                $query = "DELETE FROM cat0 WHERE id = ?";
                $statement = $db->prepare($query);
                $statement->execute(array($_POST['idToDelete']));
            }

            if(isset($_POST['addBook'])) {
                $query = "INSERT INTO cat0(name) VALUES(?)";
                $statement = $db->prepare($query);
                $statement->execute(array($_POST['name']));
            }

            $statement = $db->query("SELECT id, name FROM cat0");
            echo "<table>";
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>";
                echo $row['name'];
                echo "</td>";
                echo "<td><form method='post'><input name='removeID' " . " type='submit' value='X'>";
                echo "<input name='idToDelete' " . " type='hidden' value=${row['id']}></form></td>";
                echo "</tr>";

            }  
            echo "</table>";
        }
        else {
            echo "Not logged in!<br>";
        }

    ?>
</div>
</body>
</html>
