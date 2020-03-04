<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

<form action="create.php" method="post">
    <div class="form-row">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control mt-2" 
                        placeholder="Ange namn">
</div>
<div class="col-md-4">
            <input type="text" name="tel" class="form-control mt-2" 
                        placeholder="Ange telefon">
</div>
<div class="col-md-4">
            <input type="text" name="epost" class="form-control mt-2" 
                        placeholder="Ange epost">
</div>
<div class="col-md-4">
            <input type="text" name="adress" class="form-control mt-2" 
                        placeholder="Ange adress">
</div>
<div class="col-md-4">
    <input type="submit" class="form-control mt-2 btn-outline-primary"
            value="Lägg till">
</div>
</div>
</form>

<?php 
require_once "db.php";
//GET ALL DATA FROM DATABASE
$stmt = $db->prepare("SELECT * FROM contacts");
$stmt->execute();

$table = "<table class='table'>";
$table .= "<tr><th>Namn</th><th>Telefon</th><th>Epost</th><th>Adress</th><th>Admin</th></tr>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $table .= "<tr><td>" . $row["name"] . "</td>
            <td>" . $row["tel"] . "</td><td>" . $row["epost"] 
            . "</td><td>" . $row["adress"] . "</td>
            <td><a href='update.php?id=" 
            . $row["id"] . "'>Uppdatera</a>
            |
            <a href='delete.php?id=" . $row["id"] . "'>
            Ta bort
            </a>
            </td></tr>";
}
$table .= "</table>";
echo $table;

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>