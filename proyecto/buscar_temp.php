<?php
require_once("conexion.php");
require_once("funciones.php");

if(isset($_POST)){
    $busqueda = mysqliRealEscapeString($conn,$_POST['busqueda'] ?? null);
}

$sql = 'SELECT * FROM entradas WHERE $titulo LIKE '%$titulo%';';

