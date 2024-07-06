<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $favorites = json_decode($_POST['favorites'], true);
    $favoriteTitles = array_map(function ($anime) {
        return "{$anime['title']} - Genre: {$anime['genre']} - Studio: {$anime['studio']}";
    }, $favorites);
    $content = implode("\n", $favoriteTitles);
    file_put_contents('favorites.txt', $content);
    echo "Favorit berhasil disimpan!";
} else {
    echo "Metode tidak didukung.";
}
?>
