<html>
    <head>
        <title>{{ $article->title }}</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>{{ $article->title }}</h1>
            <h5>{{ $article->published_at }}</h5>
            <div>
                <p> {{ $article->content }}</p>
            </div>
          
            <button class="btn btn-primary" onclick="history.go(-1)">
                « Back
            </button>
        </div>
    </body>
</html>