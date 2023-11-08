<?php

$paises = getPaises();
$generos = getGeneros();
$peliculas = getPeliculas();

$titulo = $_POST['titulo'];
$pais = $_POST['pais'];
$director = $_POST['director'];
$genero = $_POST['generos'];
$año = $_POST['año'];

$new_pelicula = [
    'id' => sizeof($peliculas) + 1,
    'titulo' => $titulo,
    'pais' => $pais,
    'director' => $director,
    'generos' => $genero,
    'año' => $año

];

array_push($peliculas, $new_pelicula);

?>