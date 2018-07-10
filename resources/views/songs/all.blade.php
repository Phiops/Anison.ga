<?php 
use Anison\Song;
use Anison\Requests;
$songamount = Song::count();
$requestamount = Requests::count();
$percentage = ($songamount * 100) / ($songamount + $requestamount);
?>

<!-- HEADER IMAGE CONTAINER WITH SITE TITLE -->

<div class="jumbotron jumbotron-fluid paral my-header">
        <div class="container">
            <h1 class="display-4">Anison.ga</h1>
            <p class="lead">Your Anime Music Platform</p>
        </div>
    </div>

<section class='py-5'>
    <div class='container'>
        @if(session('success1') OR session('success2'))
        <div class="alert alert-success" role="alert">{{session('success1')}}{{session('success2')}}</div>
        <div class="card">
        @endif 
        @if(session('success1'))
            <div class="card-header"><b>Received request:</b></div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Song:</b> {{session('inputsong')}}</li>
                    <li class="list-group-item"><b>Artist:</b> {{session('inputanime')}}</li>
                    <li class="list-group-item"><b>Link:</b> {{session('inputlink')}}</li>
                </ul>
            </div><br>
        @endif
 

 
  <!-- NEWEST SONGS ADDED TO THE DATABASE -->

  <div class="container pt-lg-5">
        <div class="row d-flex">
            <div class="col-xl-8">
                <div class="card top-card shadow-lg">
                    <div class="row">
                        <?php $latestsong = Song::latest()->first(); include 'anilist.php';?>
                        <div class="col-lg-4 col-12 anime-img-bg" style="background-image: url({{$image}})">
                            <div class="row">
                            <span class="ml-3 p-2 badge badge-warning">New</span>
                            </div>
                            <div class="row">
                                <span class="anime-name-holder">
                                    <h6 class="ml-4"><a class="bright" href="https://anilist.co/anime/{{ $latestsong->animeid }}">{{ $latestsong->anime }}</a></h6>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="p-2">
                                <h3 class="card-title">{{ $latestsong->song }} </h3>
                                <p> @if(empty($latestsong->artistid)){{$latestsong->artist}} @else <a target="_blank" href='https://anilist.co/staff/{{$latestsong->artistid}}'>{{$latestsong->artist}}</a> @endif
                    </p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12 my-play-button">
                            <button type="button" class="btn btn-dark" onclick="location.href = '/play/{{$latestsong->id}}';">
                                <i class="fas fa-play"></i>
                                </button>
                        </div>
                    </div>
                    
                </div>

                <div class="mt-lg-3 mt-4 card top-card shadow-lg">
                    <div class="row">
                        <?php $latestsong = Song::orderBy('id', 'desc')->skip(1)->take(1)->get()->first(); include 'anilist.php';?>
                        <div class="col-lg-4 anime-img-bg" style="background-image: url({{$image}})">
                            <div class="row">
                                <span class="ml-3 p-2 badge badge-warning">New</span>
                            </div>
                            <div class="row">
                                <span class="anime-name-holder">
                                    <h6 class="ml-4"><a class="bright" href="https://anilist.co/anime/{{ $latestsong->animeid }}">{{ $latestsong->anime }}</a></h6>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-2">
                                <h3 class="card-title">{{ $latestsong->song }}</h3>
                                <p>  @if(empty($latestsong->artistid)){{$latestsong->artist}} @else <a target="_blank" href='https://anilist.co/staff/{{$latestsong->artistid}}'>{{$latestsong->artist}}</a> @endif</p>
                            </div>
                        </div>
                        <div class="col-lg-2 my-play-button">
                            
                            <button type="button" class="btn btn-dark" onclick="location.href = '/play/{{$latestsong->id}}';">
                                <i class="fas fa-play"></i>
                                
                        </button></div>
                    </div>
                    
                </div>
            
            </div>

            <!-- SEARCH CARD ON RIGHT HAND SIDE -->

            <div class="col-xl-4 col-sm-12 mt-4 mt-md-0">
                <div class="card shadow-lg">
                    <div class="card-body"><div class"card-title mb-5">
                    <h5>
                            <i class="fas fa-search"></i> Search Database</h5>
                                </div>
                        
                        <p>It's simple, look for either the anime, song or artist you remember and find that one song stuck
                            in you head!</p>
                    </div>
                    <div class="input-group mb-3 pl-2 pr-2">
                        <input id='myInput1' type="text" class="form-control" placeholder="What's your groove?'" aria-label="search promt" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onClick='myFunction1()' type="button">Search</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

     
<!-- RECENT ENTRIES ADDED TO DATABASE -->

    <div class="container pt-md-5 pt-lg-5 pb-5 pt-4">
    <div class="row pb-3 pl-3">
        <h2>
            <i class="fas fa-database"></i> Recently added songs</h2>
    </div>
    <div class="progress"><div class="progress-bar" role="progressbar" style="width: <?= $percentage;?>%" aria-valuenow="<?= $percentage;?>" aria-valuemin="0" aria-valuemax="100"></div></div>
     
    <div class="row">
        <div class="col-xl-12">
            
            <div class="card list-card shadow">
                <div class="p-2">Pick your poison, our database is stuffed. </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item mobile-blank">
                    <div class="row">
                        <div class="col col-heading">Anime</div>
                        <div class="col col-heading">Song</div>
                        <div class="col col-heading">Artist</div>
                        <div class="col-lg-1"></div>
                    </div>
                </li>    
                @if(count($song) > 0) @foreach($song as $song)
                    <li class="list-group-item">
                        <div class"card pb-1">
                            <div class="card-body">
                        <div class="row row-cap">
                            <div class="col-md-3 col-sm-12">
                            <a target="_blank" href='https://anilist.co/anime/{{$song->animeid}}'>{{$song->anime}}</a>
                            </div>
                            <div class="col-md-3 col-sm-12 song-title-sm">
                            <a href="/play/{{$song->id}}">{{$song->song}}</a>
                            </div>
                            <div class="col-md-3 col-sm-12">
                            @if(empty($song->artistid)){{$song->artist}} @else <a target="_blank" href='https://anilist.co/staff/{{$song->artistid}}'>{{$song->artist}}</a> @endif
                            </div>
                            <div class="col-lg-1  col-sm-12 my-play-button play-button-cap">
                                <button type="button" class="btn btn-dark" onclick="location.href = '/play/{{$song->id}}';">
                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                </button>
                            </div>
                        </div></div>
                            </div>
                    </li>@endforeach @endif
                            </ul>
                                </div>
                                </div>
                                </div>

       
        <!-- <form><input class="round" id='myInput1' onkeyup='myFunction1()' placeholder='Search for anime..' type='text'></form>
        <form><input class="round" id='myInput2' onkeyup='myFunction2()' placeholder='Search for songs..' type='text'></form>
        <form><input class="round" id='myInput3' onkeyup='myFunction3()' placeholder='Search for artists..' type='text'></form>  -->
       
    <div class="container  pb-5 mt-5">
        <div class="row pb-3">
            <h2>
                <i class="fas fa-fire"></i> Most played 24h</h2>
        </div>
        <div class="row">
        <div class="card-deck">

            <div class="card shadow-lg">
                <img class="card-img-top card-img-cap" src="vnl1baU.png.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Song title</h5>
                    <p class="card-text">Artist:</p>
                    <p class="card-text">Anime:</p>
                    <div class="row">
                        <div class="col">
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-redo"></i> replayed: 837</small>
                            </p>
                        </div>
                        <div class="col">
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-stopwatch"></i> duration: 3:37</small>
                            </p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-dark my-play-button-low">
                    <i class="fas fa-play"></i>
                </button>
            </div>
            <div class="card shadow-lg">
                <img class="card-img-top card-img-cap" src="vnl1baU.png.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Song title</h5>
                    <p class="card-text">Artist:</p>
                    <p class="card-text">Anime:</p>
                    <div class="row">
                        <div class="col">
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-redo"></i> replayed: 837</small>
                            </p>
                        </div>
                        <div class="col">
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-stopwatch"></i> duration: 3:37</small>
                            </p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-dark my-play-button-low">
                    <i class="fas fa-play"></i>
                </button>
            </div>
            <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
        </div>
        </div>
    </div>
</section>