<?php
// Simuliamo il recupero dei dati da un file JSON
$albumsData = file_get_contents('albums.json');
$albums = json_decode($albumsData, true);

sleep(1);

// Restituiamo i dati in formato JSON
header('Content-Type: application/json');
echo json_encode($albums);
