const apiUrl = 'http://localhost:8080/api/v1/fetch-movies';

async function getMovies(url) {
    try {
        let result = await fetch(url);
        return await result.json();
    } catch (error) {
        console.log(error);
    }
}

let buttons = document.getElementsByClassName('btn');

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', async function () {
        await renderMovies(buttons[i]);
    });
}

async function renderMovies(button) {
    let movieContainer = document.getElementById('movie-container');
    let movies = await getMovies(apiUrl + '?q=' + button.getAttribute('data-query'));
    let content = ``;
    movies.data.forEach(movie => {
        content += `
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img height="200" width="200"
                            src="${movie.poster ? movie.poster.path : '/img/no-image.jpg'}"
                            class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${movie.title} (${movie.year})</h5>
                            <p class="card-text">IMDB ID: ${movie.imdbId}</p>
                            <p class="card-text"><small class="text-muted">Type: ${movie.type}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    })

    movieContainer.innerHTML = content;
}