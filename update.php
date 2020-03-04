<?php 
require "db.php";

//GET ALL DATA TO POPULATE INPUT FIELDS
$id = $_GET["id"];
$stmt = $db -> prepare("SELECT * FROM contacts WHERE id=:id");
$stmt -> bindParam(":id", $id);
$stmt -> execute();

if ($stmt -> rowCount() > 0) {
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $name = $row["name"];
    $tel = $row["tel"];
    $epost = $row["epost"];
    $adress = $row["adress"];
} else {
    header("Location: index.php");
}

//UPDATING DATABASE WITH NEW DATA FROM INPUT
if ($_SERVER ["REQUEST_METHOD"] === "POST") :
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $epost = $_POST["epost"];
    $adress = $_POST["adress"];
    $id = $_GET["id"];
    $sql = "UPDATE contacts SET name = :name, tel = :tel, epost = :epost, adress = :adress WHERE id = :id";
    $stml = $db -> prepare($sql);
    $stml -> bindParam(":name", $name);
    $stml -> bindParam(":tel", $tel);
    $stml -> bindParam(":epost", $epost);
    $stml -> bindParam(":adress", $adress);
    $stml -> bindParam(":id", $id);
    $stml -> execute();
    header("Location: index.php");
endif;
?>

<form method="post" action="?id=<?php echo $id; ?>">
<div class="form-row">
<div class="col-md-4">
<input type="text" name="name" value="<?php echo $name; ?>"
        class="form-control mt-2" placeholder="Ange namn">
</div>
<div class="col-md-4">
<input type="text" name="tel" value="<?php echo $tel; ?>"
        class="form-control mt-2" placeholder="Ange telefon/mobil">
</div>
<div class="col-md-4">
<input type="text" name="epost" value="<?php echo $epost; ?>"
        class="form-control mt-2" placeholder="Ange epost">
</div>
<div class="col-md-4">
<input type="text" name="adress" value="<?php echo $adress; ?>"
        class="form-control mt-2" placeholder="Ange adress">
</div>
<div class="col-md-4">
<input type="submit" class="form-control mt-2 btn btn-outline-primary" 
        value="Uppdatera">

</div>
</div>
</form>