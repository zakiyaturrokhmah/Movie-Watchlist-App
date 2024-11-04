<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Watchlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    public function addNewFilm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_film' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'tahun_rilis' => 'required|integer|digits:4',
            'sutradara' => 'required|string|max:255',
            'deskripsi_film' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $lastFilm = Film::orderBy('id_film', 'desc')->first();
        if ($lastFilm) {
            $lastId = intval(substr($lastFilm->id_film, 1));
            $newId = 'F' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'F001';
        }

        $data = $request->only(['judul_film', 'genre', 'tahun_rilis', 'sutradara', 'deskripsi_film']);
        $data['id_film'] = $newId;

        Film::create($data);

        return redirect()->route('film.allFilm');
    }

    public function getAllFilm(Request $request)
    {
        $films = Film::all();
        $watchlist = Watchlists::where("id_pengguna", $request->cookie('id_pengguna'))->get();

        return view('daftar-film', compact('films', 'watchlist'));
    }
    public function addFilmToWatchList(Request $request, $id_film)
    {

        $validator = Validator::make(['id_film' => $id_film], [
            'id_film' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $correctIdFilm = Film::where("id_film", $id_film)->first();

        if (!$correctIdFilm) {
            return response()->json(['success' => false, 'message' => 'Film not found'], 404);
        }

        $lastWatchlist = Watchlists::orderBy('id_watchlists', 'desc')->first();
        if ($lastWatchlist) {
            $lastId = intval(substr($lastWatchlist->id_watchlists, 1));
            $newId = 'W' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'W001';
        }

        $data = [
            "id_watchlists" => $newId,
            "id_pengguna" => $request->cookie('id_pengguna'),
            "id_film" => $id_film,
        ];

        Watchlists::create($data);

        return redirect()->route('user.dashboard')->with('success', 'Film added to watchlist successfully!');
    }

    public function updateStatusFilm(Request $request, $id_film)
    {
        $watchlist = Watchlists::where("id_watchlists", $id_film)->first();

        if (!$watchlist) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Film not found'
            ]);
        }

        $watchlist->status = 'sudah ditonton';
        $watchlist->save();
        return redirect()->route('user.dashboard')->with('success', 'Film status updated successfully!');
    }


    public function deleteFilm($id_film)
    {
        $film = Film::where('id_film', $id_film)->first();

        if ($film) {
            $film->delete();

            return redirect()->route('film.allFilm')->with('success', 'film deleted successfully');
        } else {
            return redirect()->route('user.allFilm')->with('fail', 'film not found');
        }
    }

    public function deleteWatchlist($id_watchlist)
    {
        $watchlist = Watchlists::where('id_watchlists', $id_watchlist)->first();

        if ($watchlist) {
            $watchlist->delete();

            return redirect()->route('user.dashboard')->with('success' . 'watchlist deleted sucessfully');
        } else {
            return redirect()->route('user.dashboard')->with('fail', 'watchlists failed to delete');
        }
    }
}
