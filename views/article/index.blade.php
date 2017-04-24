<html>
    <head>
        <title>{{ config('blog.title') }}</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>{{ config('blog.title') }}</h1>
            <h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
            <hr>
            <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ url('article-detail.html/'.$article->slug) }}">{{ $article->title }}</a>
                    <em>({{ $article->published_at }})</em>
                    <p>
                        {{ str_limit($article->content) }}
                    </p>
                </li>
            @endforeach
            </ul>
            <hr>
            {!! $articles->render() !!}
        </div>
    </body>
</html>