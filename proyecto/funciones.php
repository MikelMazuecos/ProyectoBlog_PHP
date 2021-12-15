<?php

require_once("conexion.php");

function conseguirCategorias($conn){
    $categorias = "SELECT id,nombre FROM categorias;";
    $guardar = mysqli_query($conn,$categorias);
    return $guardar;
}

function conseguirUltimasEntradas($conn,$busqueda = null){
    $where = isset($busqueda) ? "WHERE titulo LIKE '%$busqueda%'" : '';

    $entradas = "SELECT e.*,c.nombre
                FROM entradas e
                INNER JOIN categorias c ON e.categoria_id = c.id
                $where
                ORDER BY e.id;";
    $guardar = mysqli_query($conn,$entradas);
    return $guardar;
}

function conseguirEntradasUnicaCategoria($conn,$categoria){
    $entradas = "SELECT *
                FROM entradas
                INNER JOIN categorias ON entradas.categoria_id = categorias.id
                WHERE categoria.nombre = $categoria
                ORDER BY entradas.id;";
    $guardar = mysqli_query($conn,$entradas);
    return $guardar;
}

function mysqliRealEscapeString($conn, $val)
{
    if (!isset($val))
        return null;

    return mysqli_real_escape_string($conn, trim($val));
}