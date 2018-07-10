<head>
    <meta content="{{setting('site.description')}}" name="description">
    <meta content="{{setting('site.title')}}" property="og:title">
    <meta content="{{setting('site.url')}}" property="og:url">
    <meta content="{{setting('site.title')}}" property="og:site_name">
    <title>{{setting('site.title')}}</title>
    @include('inc.jquerybs')
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>@include('inc.navbar')<header>@include('songs.all')</header></body>