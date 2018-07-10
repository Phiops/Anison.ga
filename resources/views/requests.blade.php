<?php 
use Anison\Song;
use Anison\Requests;
$songamount = Song::count();
$requestamount = Requests::count();
$percentage = ($songamount * 100) / ($songamount + $requestamount)
?>

<head>
    @include('inc.jquerybs')
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <title>Requests - {{setting('site.title')}}</title>
</head>

@include('inc.navbar')
<br><body style="text-align: left;">


    <section class="py-5">
        <div class="container">
            <h1 class="mb-3"><i class="fas fa-parachute-box"></i> Drop a request</h1>
            <div class="card">
                <div class="card-body">
            @if(count($errors) > 0)@foreach($errors->all() as $error)
                <div class="alert alert-danger"><br>{{$error}}<br></div>
            @endforeach @endif

            {!! Form::open(['url' => 'requests/new']) !!}
            <div class="form-group">{{Form::label('song', 'Song')}} {{Form::text('song', '', ['class' => 'form-control', 'placeholder' => 'Enter song'])}}</div>
            <div class="form-group">{{Form::label('anime', 'Anime')}} {{Form::text('anime', '', ['class' => 'form-control', 'placeholder' => 'Enter anime title'])}}</div>
            <div class="form-group">{{Form::label('link', 'Link')}} {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Enter a URL that links to this song (e.g. YouTube, Spotify, CDJapan, ...)'])}}</div>
            <div>{{Form::submit('Submit', ['class' => 'btn btn-block btn-lg btn-outline-primary'])}}</div>
            {!! Form::close() !!}
        </div>
</div>
</div>
    </section>

    
    <section class='py-5'>
        <div class='container'>
            <h1 class="mb-3"><i class="fas fa-box-open"></i> Requested songs</h1>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $percentage;?>%" aria-valuenow="<?= $percentage;?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <table id='myTable'>
                <tr class='header'>
                    <th style='width:40%;'>Song</th>
                    <th style='width:40%;'>Anime</th>
                    @notmobile<th style='width:20%;'>URL</th>@endnotmobile
                </tr>
                @if(count($requests) > 0) @foreach($requests as $request)
                <tr>
                    <td>{{$request->song}}</td>
                    <td>{{$request->anime}}</td>
                    @notmobile<td>{{$request->link}}</td>@endnotmobile
                </tr>@endforeach @endif</div>
            </table>
    </section>
</body>
