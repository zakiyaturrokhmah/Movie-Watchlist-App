<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
</head>

<body>
    <div class="container-fluid bg-black">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4 text-white fs-6">Movie Watchlist App</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{route('user.dashboard')}}" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="{{route('film.allFilm')}}" class="nav-link text-white">Daftar Film</a></li>
            </ul>
        </header>
    </div>
    <div>
        <h1>Tambah Film</h1>
        <form method="post" action="{{route('film.newFilm')}}">
            @csrf
            <div class="">
                <label for="title">judul film</label>
                <input type="text" name="judul_film" id="title" placeholder="judul film">
            </div>
            <div>
                <label for="genre">genre</label>
                <input type="text" name="genre" id="genr" placeholder="genre">
            </div>
            <div>
                <label for="tahun_rilis">tahun rilis</label>
                <input type="text" name="tahun_rilis" id="tahun_rilis" placeholder="tahun rilis">
            </div>
            <div>
                <label for="sutradara">sutradara</label>
                <input type="text" name="sutradara" id="sutradara" placeholder="sutradara">
            </div>
            <div>
                <label for="deskripsi_film">deskripsi film</label>
                <input type="text" name="deskripsi_film" id="deskripsi_film" placeholder="deskripsi_film">
            </div>
            <input type="submit" value="tambah film">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>