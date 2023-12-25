<div class="row">
    <div class="col-md-4">
        <h2 class="text-center">List</h2>
        <form wire:submit.prevent="search" class="custom-form" wire:loading.attr="disabled">
            <div class="input-group">
                <input type="text" class="form-control custom-input" wire:model.debounce.lazy="query" placeholder="Search">
            </div>
            <div class="input-group justify-content-center mt-2">
                <button type="submit" class="btn custom-btn btn-success mr-2">Search</button>
                <button type="button" class="btn custom-btn btn-primary text-light" wire:click.prevent="reload" wire:loading.attr="disabled">Playing NOW</button>
            </div>

        </form>
        <ul class="list-group">
            @foreach($movies as $movie)
                <a href="#movie">
                    <li class="list-group-item" wire:click="showMovieDetails({{ $movie['id'] }})">
                        <div class="row">
                            <div class="col-md-8">
                                {{ $movie['title'] }}
                            </div>
                            <div class="col-md-4 text-end"> <!-- Apply 'text-end' class here -->
                                <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" class="img-fluid mb-2" width="45px" alt="Movie Poster">
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>

    </div>
    <!-- Second row for the detailed article -->
    <div class="col-md-8">
        @if($selectedMovie)
        <h2 class="text-center" id="movie">Movie Details</h2>
            <div class="card bg-light">
                <div class="card-body text-center" wire:loading>
                    <img src="https://i.gifer.com/origin/34/34338d26023e5515f6cc8969aa027bca.gif"  width="80px">
                </div>
                <div class="card-body text-center" wire:loading.remove> <!-- Add text-center class to center the content -->
                    <img src="https://image.tmdb.org/t/p/w200{{ $selectedMovie['poster_path'] }}" class="img-fluid mb-2" alt="Movie Poster">
                    <h5 class="card-title">{{ $selectedMovie['title'] }}</h5>
                    <small>{{ $selectedMovie['overview'] }}</small>
                    <table class="table mt-3" >
                        <tbody>
                        <tr>
                            <td><strong>Release Date</strong></td>
                            <td>{{ \Carbon\Carbon::parse($selectedMovie['release_date'])->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <td><strong>Family Friendly</strong></td>
                            <td>{!! $selectedMovie['adult'] ? "<p class='text-danger'>For adults</p>" : "<p class='text-success'>Family Friendly</p>" !!}</td>
                        </tr>
                        <tr>
                            <td><strong>Country</strong></td>
                            <td>
                                @foreach($selectedMovie['production_countries'] as $country)
                                    {{$country['name']}}
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.1.0//flags/4x3/{{strtolower($country['iso_3166_1'])}}.svg" width="20px">
                                    @if (!$loop->last)
                                        -
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Budget</strong></td>
                            <td>{{ number_format($selectedMovie['budget']) }}$</td>
                        </tr>
                        <tr>
                            <td><strong>Revenue</strong></td>
                            <td>{{ number_format($selectedMovie['revenue']) }}$</td>
                        </tr>
                        <tr>
                            <td><strong>Website</strong></td>
                            <td><a target="_blank" href="{{ $selectedMovie['homepage'] }}">{{ $selectedMovie['homepage'] }}</a> </td>
                        </tr>
                        <tr>
                            <td><strong>Genre</strong></td>
                            <td>
                                @foreach($selectedMovie['genres'] as $genre)
                                    {{$genre['name']}}
                                    @if (!$loop->last)
                                        -
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Production Companies</strong></td>
                            <td>
                                @foreach($selectedMovie['production_companies'] as $company)
                                    {{$company['name']}}
                                    @if (!$loop->last)
                                        -
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Voting</strong></td>
                            <td>{{$selectedMovie['vote_average'] }} out of {{ number_format($selectedMovie['vote_count']) }} votes</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4 class="card-title text-center">Similar Movies</h4>
                            <ul class="list-group">
                                @foreach($Similarmovies as $movie)
                                    <a href="#movie">
                                        <li class="list-group-item" wire:click="showMovieDetails({{ $movie['id'] }})">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {{ $movie['title'] }}
                                                </div>
                                                <div class="col-md-4 text-end"> <!-- Apply 'text-end' class here -->
                                                    <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" class="img-fluid mb-2" width="45px" alt="Movie Poster">
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
            @else
            <h2 class="text-center"></h2>
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title text-center">One more step...</h5>
                    <p class="card-text text-center">
                        please select a movie first to show details.<br>
                    <h3 class="text-center">🙂</h3>
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>

