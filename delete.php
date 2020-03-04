<?php 
require_once "db.php";

$id = $_GET["id"];

$sql = "DELETE FROM contacts WHERE id = :id";
$stml = $db -> prepare($sql);
$stml -> bindParam(":id", $id);
$stml -> execute();

header ("Location: index.php");
?>