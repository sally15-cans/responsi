document.addEventListener('DOMContentLoaded', () => {
    loadAnimeList();
    loadHitCounter();
});

const animeList = [
    { title: 'Naruto', genre: 'Action, Adventure', studio: 'Studio Pierrot' },
    { title: 'Boruto', genre: 'Action, Adventure', studio: 'Studio Pierrot' },
    { title: 'Attack on Titan', genre: 'Action, Drama', studio: 'Wit Studio, MAPPA' },
    { title: 'Demon Slayer', genre: 'Action, Supernatural', studio: 'ufotable' },
];

const favorites = [];

function loadAnimeList() {
    const animeContainer = document.getElementById('anime-container');
    animeList.forEach(anime => {
        const li = document.createElement('li');
        li.textContent = `${anime.title} - ${anime.genre} - ${anime.studio}`;
        li.onclick = () => addToFavorites(anime);
        animeContainer.appendChild(li);
    });
}

function addToFavorites(anime) {
    if (!favorites.includes(anime)) {
        favorites.push(anime);
        const favoritesContainer = document.getElementById('favorites-container');
        const li = document.createElement('li');
        li.textContent = `${anime.title} - ${anime.genre} - ${anime.studio}`;
        favoritesContainer.appendChild(li);
    }
}

function saveFavorites() {
    const blob = new Blob([JSON.stringify(favorites, null, 2)], { type: 'text/plain' });
    const anchor = document.createElement('a');
    anchor.download = 'favorites.txt';
    anchor.href = window.URL.createObjectURL(blob);
    anchor.click();
}

function loadHitCounter() {
    fetch('hitcounter.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('hit-counter').textContent = data;
        });
}
