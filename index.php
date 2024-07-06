<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otakuverse</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Otakuverse</h1>
    </header>
    <main>
        <section id="anime-list">
            <h2>Anime Musim Ini</h2>
            <ul id="anime-container">
                <?php
                $animeList = [
                    ['title' => 'Naruto', 'genre' => 'Action, Adventure', 'studio' => 'Studio Pierrot'],
                    ['title' => 'Boruto', 'genre' => 'Action, Adventure', 'studio' => 'Studio Pierrot'],
                    ['title' => 'Attack on Titan', 'genre' => 'Action, Drama', 'studio' => 'Wit Studio, MAPPA'],
                    ['title' => 'Demon Slayer', 'genre' => 'Action, Supernatural', 'studio' => 'ufotable']
                ];

                foreach ($animeList as $anime) {
                    echo "<li onclick=\"addToFavorites('{$anime['title']}', '{$anime['genre']}', '{$anime['studio']}')\">";
                    echo "{$anime['title']} - Genre: {$anime['genre']} - Studio: {$anime['studio']}";
                    echo "</li>";
                }
                ?>
            </ul>
        </section>
        <section id="favorites">
            <h2>Anime Favorit</h2>
            <ul id="favorites-container">
                <!-- Anime favorit akan ditampilkan di sini -->
            </ul>
            <form method="post" action="save_favorites.php" id="favoritesForm">
                <input type="hidden" name="favorites" id="favoritesInput">
                <button type="submit">Simpan Favorit</button>
            </form>
        </section>
    </main>
    <script>
        const favorites = [];

        function addToFavorites(title, genre, studio) {
            const anime = { title, genre, studio };
            if (!favorites.some(fav => fav.title === title)) {
                favorites.push(anime);
                const favoritesContainer = document.getElementById('favorites-container');
                const li = document.createElement('li');
                li.textContent = `${title} - Genre: ${genre} - Studio: ${studio}`;
                favoritesContainer.appendChild(li);
            }
            document.getElementById('favoritesInput').value = JSON.stringify(favorites);
        }
    </script>
</body>
</html>
