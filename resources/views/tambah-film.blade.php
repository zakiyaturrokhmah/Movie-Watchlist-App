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
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 70px;">
        <h1>Tambah Film</h1>
        <form class="bg-body-tertiary" style="width: 500px; padding: 50px; border-radius: 20px" method="post" action="{{route('film.newFilm')}}">
            @csrf
            <div class="row g-3">

                <div class="col-12">
                    <label for="judul_film" class="form-label">Judul Film</label>
                    <input type="text" class="form-control" id="judul_film" name="judul_film" placeholder="isi judul film">
                    <div class="invalid-feedback">
                        judul film wajib di isi
                    </div>
                </div>
                <div class="col-12">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" placeholder="genre film">
                    <div class="invalid-feedback">
                        genre film wajib di isi
                    </div>
                </div>
                <div class="col-12">
                    <label for="tahun_rilis" class="form-label">Tahun Rilis</label>
                    <input type="number" class="form-control" id="tahun_rilis" name="tahun_rilis" placeholder="tahun rilis film">
                    <div class="invalid-feedback">
                        tahun film wajib di isi
                    </div>
                </div>
                <div class="col-12">
                    <label for="sutradara" class="form-label">Sutradara</label>
                    <input type="text" class="form-control" id="sutradara" name="sutradara" placeholder="sutradara film">
                    <div class="invalid-feedback">
                        sutradara film wajib di isi
                    </div>
                </div>
                <div class="col-12">
                    <label for="deskripsi_film" class="form-label">Deskripsi film</label>
                    <textarea class="form-control" name="deskripsi_film" id=""></textarea>
                    <div class="invalid-feedback">
                        deskripsi film wajib di isi
                    </div>
                </div>
                <div>
                    <input class=" btn btn-primary" type="submit" value="tambah film">
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>