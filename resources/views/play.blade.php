<?php
$audiolink="https://my.mixtape.moe/{$latestsong->audioid}";
$artistlink="https://anilist.co/staff/{$latestsong->artistid}";
$animelink="https://anilist.co/anime/{$latestsong->animeid}";
include 'anilist.php';
?>

<head>
    @include('inc.jquerybs')
    <meta content='width=device-width, initial-scale=1, shrink-to-fit=no' name='viewport'>
    <meta content='{{$latestsong->artist}} - {{$latestsong->song}}' property='og:title'>
    <meta content='{{$audiolink}}' property='og:audio'>
    <meta content='Anison.ga' property='og:site_name'>
    <link rel=icon href='{{url('/')}}/favicon.ico'>
    <title>{{$latestsong->artist}} - {{$latestsong->song}}</title>
</head>

<body class="play">
    @include('inc.navbar')
    <br><br><h1>@if(empty($latestsong->artistid)){{$latestsong->artist}} @else <a target="_blank" href="<?= $artistlink?>">{{$latestsong->artist}}</a> @endif - {{$latestsong->song}}</h1>
    <h3><a target="_blank" href="<?= $animelink?>">{{$latestsong->anime}}</a></h3><br><br>
    <div class='round audio'><audio preload='auto' controls loop controlsList='nodownload' src='<?= $audiolink?>'></audio></div><br> 
    @if(empty($latestsong->lyrics)) @else
    <button class="btn btn-outline-dark btn-lg btn-block round audio" type="button" data-toggle="collapse" data-target="#collapseLyrics" aria-expanded="false" aria-controls="collapseLyrics">Show/hide lyrics</button>
    <div class="collapse" id="collapseLyrics"><br><div class="card card-body lyrics">{{$latestsong->lyrics}}</div>
    </div>@endif<br>

    @notmobile
    <button class="btn btn-outline-dark btn-lg btn-block audio" type="button" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo">Show/hide anime info</button>
    <div class="collapse" id="collapseInfo"><br>
        <div class="card audio text-center">
            <div class="card-header">Anime Info</div>
            <div style="vertical-align: middle;" class="card-body">
                <p class="round mr-3 " style="float: left; height: auto; width: auto;"><img src="{{$image}}" border="1px"></p>
                <div class="list-group">
                    <a class="list-group-item"><h4>{{$romaji}} | {{$native}}</h4></a>
                    <a class="list-group-item text-left"><b>Description:</b> {{$description}}</a>
                    <a class="list-group-item text-left"><b>Episodes:</b> {{$episodes}}</a>
                    <a class="list-group-item text-left"><b>Duration:</b> {{$duration}}</a>
                    <a class="list-group-item text-left"><b>Started:</b> {{$start}}</a>
                    <a class="list-group-item text-left"><b>Ended:</b> {{$end}}</a>
                </div>
            </div>
        </div>
    </div>
    @endnotmobile
</body><br><br>
