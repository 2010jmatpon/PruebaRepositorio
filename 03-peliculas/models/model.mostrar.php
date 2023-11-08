<?php

/*

    Modelo: model.mostrar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea mostrar

*/

    $paises = getPaises();
    $generos = getGeneros();
    $peliculas = getPeliculas();

    $id = $_GET['id'];

    
    $indice_mostrar = buscar_en_tabla($peliculas, 'id', $id);

    if ($indice_mostrar !== 'false') {
        
        $pelicula = $peliculas[$indice_mostrar];

    } else {
        echo 'ERROR: pelicula no encontrada';
    }



?>