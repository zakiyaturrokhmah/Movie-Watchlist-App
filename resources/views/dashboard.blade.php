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
                <li class="nav-item"><a href="{{route('user.tambah-film')}}" class="nav-link text-white">Tambah Film</a></li>
            </ul>
            <div>
                <form action="{{route('user.logOut')}}" method="post">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="log out"></input>
                </form>
            </div>
        </header>
    </div>

    <div>
        <div class="container">
            <h1 class="mb-4">My Watchlist</h1>

            @if ($watchlistFormat->isEmpty())
            <p>Tidak ada film dalam watchlist.</p>
            @else
            <table class="table">
                <thead class=" table-dark text-center">
                    <tr>
                        <th>Judul Film</th>
                        <th>Genre</th>
                        <th>Tahun Rilis</th>
                        <th>Status</th>
                        <th>update</th>
                    </tr>
                </thead>
                <tbody class=" text-center">
                    @foreach ($watchlistFormat as $watchlists)
                    <tr>
                        <td>{{ $watchlists->film->judul_film }}</td>
                        <td>{{ $watchlists->film->genre }}</td>
                        <td>{{ $watchlists->film->tahun_rilis }}</td>
                        <td>{{ $watchlists->status}}</td>
                        <td style="display: flex; justify-content: center">
                            <div style="display: flex; gap: 10px">
                                <form method="POST" action="{{ route('film.updateStatus', ['id_film' => $watchlists->id_watchlists]) }}">
                                    @csrf
                                    <button type="submit">Update</button>
                                </form>
                                <form method="POST" action="{{ route('watchlist.delete', ['id_watchlist' => $watchlists->id_watchlists]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>