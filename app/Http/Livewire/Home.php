<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Home extends Component
{
    public $movies;
    public $selectedMovie;
    public $Similarmovies;
    public $query;
    public $searchResults;

    public function search(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMjMyNDZlYjkyMzNmM2VhZTI4YTk1MjJiZWMwMDk0ZiIsInN1YiI6IjY1ODM5YmJjZTI5NWI0M2MwMDY4YTQ0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.4obMDT2Znp-u_FmwEEMO6dbCrAbW9uPJfG9k8dD6EyU',
        ])->get('https://api.themoviedb.org/3/search/movie',[
            'query'=>$this->query,
            'include_adult'=>true,
            'language'=>'en-US'
        ]);

        $this->movies = $response->json('results');

    }

    public function reload(){
        $this->query = '';
        $this->mount();
    }


    public function mount()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMjMyNDZlYjkyMzNmM2VhZTI4YTk1MjJiZWMwMDk0ZiIsInN1YiI6IjY1ODM5YmJjZTI5NWI0M2MwMDY4YTQ0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.4obMDT2Znp-u_FmwEEMO6dbCrAbW9uPJfG9k8dD6EyU',
        ])->get('https://api.themoviedb.org/3/movie/now_playing?language=en-US&page=1');

        if ($response->successful()) {
            $this->movies = $response->json()['results'] ?? [];
        } else {
            $this->movies = [];
        }
    }

    public function showMovieDetails($movieId)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMjMyNDZlYjkyMzNmM2VhZTI4YTk1MjJiZWMwMDk0ZiIsInN1YiI6IjY1ODM5YmJjZTI5NWI0M2MwMDY4YTQ0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.4obMDT2Znp-u_FmwEEMO6dbCrAbW9uPJfG9k8dD6EyU',
        ])->get("https://api.themoviedb.org/3/movie/{$movieId}?language=en-US");

        if ($response->successful()) {
            $this->selectedMovie = $response->json();
            $responseSimilar = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMjMyNDZlYjkyMzNmM2VhZTI4YTk1MjJiZWMwMDk0ZiIsInN1YiI6IjY1ODM5YmJjZTI5NWI0M2MwMDY4YTQ0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.4obMDT2Znp-u_FmwEEMO6dbCrAbW9uPJfG9k8dD6EyU',
            ])->get("https://api.themoviedb.org/3/movie/{$movieId}/similar?language=en-US&page=1");

            if ($responseSimilar->successful()) {
                $this->Similarmovies = $responseSimilar->json()['results'] ?? [];
            }
        } else {
            $this->selectedMovie = null;
        }


        $genres = json_encode(
            collect($this->selectedMovie['genres'] ?? [])
                ->pluck('name')
                ->filter()
                ->toArray()
        );

        $countries = json_encode(
            collect($this->selectedMovie['production_countries'] ?? [])
                ->pluck('name')
                ->filter()
                ->toArray()
        );

        $companies = json_encode(
            collect($this->selectedMovie['production_companies'] ?? [])
                ->pluck('name')
                ->filter()
                ->toArray()
        );

        $movieinDB = Movie::where('tmdb_id', $this->selectedMovie['id'])->first();

        if (!$movieinDB){
            Movie::create([
                'tmdb_id'=>$this->selectedMovie['id'],
                'title'=>$this->selectedMovie['original_title'],
                'overview'=>$this->selectedMovie['overview'],
                'url'=>$this->selectedMovie['homepage'],
                'release_date'=>$this->selectedMovie['release_date'],
                'adult'=>$this->selectedMovie['adult'],
                'genres'=>$genres,
                'countries'=>$countries,
                'companies'=>$companies,
                'budget'=>$this->selectedMovie['budget'],
                'revenue'=>$this->selectedMovie['revenue'],
                'vote_average'=>$this->selectedMovie['vote_average'],
                'vote_count'=>$this->selectedMovie['vote_count'],
            ]);
        }

    }




    public function render()
    {
        return view('livewire.home');
    }
}
