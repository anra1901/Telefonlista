<?php 
require_once "db.php";

$name = $_POST["name"];
$tel = $_POST["tel"];
$epost = $_POST["epost"];
$adress = $_POST["adress"];

// Förbered en SQL-sats att binda parametrar
$stmt = $db -> prepare("INSERT INTO contacts (name, tel, epost, adress) VALUES (:name, :tel, :epost, :adress)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":tel", $tel);
$stmt->bindParam(":epost", $epost);
$stmt->bindParam(":adress", $adress);

// Kör SQL-satsen (infoga en rad)
$stmt->execute();
header("Location: index.php");

?>