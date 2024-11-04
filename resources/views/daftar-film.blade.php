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
    <div class="container-xxl">
        <h1 class="mb-4">Daftar Film</h1>

        @if ($films->isEmpty())
        <p>Tidak ada film dalam daftar.</p>
        @else
        <table class="table">
            <thead class=" table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul Film</th>
                    <th>Genre</th>
                    <th>Tahun Rilis</th>
                    <th>Sutradara</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class=" text-center">
                @foreach ($films as $film)
                <tr>
                    <td>{{ $film->id_film }}</td>
                    <td>{{ $film->judul_film }}</td>
                    <td>{{ $film->genre }}</td>
                    <td>{{ $film->tahun_rilis }}</td>
                    <td>{{ $film->sutradara }}</td>
                    <td>{{ $film->deskripsi_film }}</td>
                    <td style=" display: flex; justify-content: center; gap: 10px">
                        <form method="POST" action="{{route('film.addToWatchList', ['id_film' => $film->id_film])}}">
                            @csrf
                            <input type="submit" value="tambahkan watchlist">
                        </form>
                        <form action="{{ route('film.delete', $film->id_film) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <div class="container py-5">
        <h1>Tidak menemukan film?</h1>
        <a href="{{route('user.tambah-film')}}" class=" btn btn-primary my-2">tambah film</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>