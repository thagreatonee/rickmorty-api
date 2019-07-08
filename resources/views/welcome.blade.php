<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm bg-light">

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>

    </nav>
    <div class="row">
        <div class="col-lg-12">
            <h1 id="show-episodes">Show Episodes</h1>
            <p>Show all Episodes.
                Includes Comments count for each episode.</p>
            <p><strong>URL</strong> : &#39;/api/episodes/&#39;</p>
            <p><strong>Method</strong> : <code>GET</code></p>
            <p><strong>Auth required</strong> : NO</p>
            <h2 id="success-responses">Success Responses</h2>
            <p><strong>Condition</strong> : list of episodes is returned.</p>
            <p><strong>Code</strong> : <code>200 OK</code></p>
            <p><strong>Content</strong> : </p>
            <pre><code class="lang-json">[
    {
        <span class="hljs-attr">"id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Pilot"</span>,
        <span class="hljs-attr">"air_date"</span>: <span class="hljs-string">"December 2, 2013"</span>,
        <span class="hljs-attr">"episode"</span>: <span class="hljs-string">"S01E01"</span>,
        <span class="hljs-attr">"characters"</span>:[<span class="hljs-string">"https://rickandmortyapi.com/api/character/1"</span>, <span class="hljs-string">"https://rickandmortyapi.com/api/character/2"</span>,…],
        <span class="hljs-attr">"url"</span>: <span class="hljs-string">"https://rickandmortyapi.com/api/episode/1"</span>,
        <span class="hljs-attr">"created"</span>: <span class="hljs-string">"10-11-2017 12:56:33 PM"</span>,
        <span class="hljs-attr">"comment_count"</span>: <span class="hljs-number">2</span>
    },
]
</code></pre>
            <h2 id="error-response">Error Response</h2>
            <p><strong>Condition</strong> : Wrong Api is Entered</p>
            <p><strong>Code</strong> : <code>404 NOT FOUND</code></p>
            <p><strong>Content</strong> :</p>
            <pre><code class="lang-json">{
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"404 Not Found"</span>,
    <span class="hljs-attr">"status_code"</span>: <span class="hljs-number">404</span>
}
</code></pre>
            <h1 id="show-comments">Show Comments</h1>
            <p>Show all Comments.</p>
            <p><strong>URL</strong> : &#39;/api/comments/&#39;</p>
            <p><strong>Method</strong> : <code>GET</code></p>
            <h2 id="success-responses">Success Responses</h2>
            <p><strong>Condition</strong> : List of comments is returned</p>
            <p><strong>Code</strong> : <code>200 OK</code></p>
            <p><strong>Content</strong> : </p>
            <pre><code class="lang-json">[
    {
        <span class="hljs-attr">"id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"episode_id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"comment"</span>: <span class="hljs-string">"third comment"</span>,
        <span class="hljs-attr">"ip"</span>: <span class="hljs-string">"127.0.0.1"</span>,
        <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2019-07-07 20:07:17"</span>
    },
]
</code></pre>
            <h2 id="error-response">Error Response</h2>
            <p><strong>Condition</strong> : </p>
            <p><strong>Code</strong> : <code>404 NOT FOUND</code></p>
            <p><strong>Content</strong> :</p>
            <pre><code class="lang-json">{
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"404 Not Found"</span>,
    <span class="hljs-attr">"status_code"</span>: <span class="hljs-number">404</span>
}
</code></pre>
            <h1 id="create-comments">Create Comments</h1>
            <p>Add Comments To Episode</p>
            <p><strong>URL</strong> : &#39;/api/episode/:episode/comment/create&#39;</p>
            <p><strong>URL Parameters</strong> : <code>episode=[integer]</code> where <code>episode</code> is the ID of the Episode in the database.</p>
            <p><strong>Method</strong> : <code>POST</code></p>
            <h2 id="success-responses">Success Responses</h2>
            <p><strong>Condition</strong> : New Comment is added to an episode</p>
            <p><strong>Code</strong> : <code>200 OK</code></p>
            <p><strong>Content</strong> : </p>
            <pre><code class="lang-json">[
    {
        <span class="hljs-attr">"message"</span> : <span class="hljs-string">"Comment Added"</span>,
        <span class="hljs-attr">"status_code"</span> : <span class="hljs-number">200</span>
    },
]
</code></pre>
            <h2 id="error-response">Error Response</h2>
            <p><strong>Condition</strong> : If wrong api is entered</p>
            <p><strong>Code</strong> : <code>404 NOT FOUND</code></p>
            <p><strong>Content</strong> :</p>
            <pre><code class="lang-json">{
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"404 Not Found"</span>,
    <span class="hljs-attr">"status_code"</span>: <span class="hljs-number">404</span>
}
</code></pre>
            <h3 id="or">Or</h3>
            <p><strong>Condition</strong> : If Validation fails</p>
            <p><strong>Code</strong> : <code>403 FORBIDDEN</code></p>
            <p><strong>Content</strong> :</p>
            <pre><code class="lang-json">
    {
    <span class="hljs-attr">"comment"</span>:[
      <span class="hljs-string">"The comment field is required."</span>
      ],
    }
</code></pre>
            <h1 id="comments-by-episode">Comments By Episode</h1>
            <p>Retrieve Comments For an Episode</p>
            <p><strong>URL</strong> : &#39;/api/episode/:episode/comments&#39;</p>
            <p><strong>URL Parameters</strong> : <code>episode=[integer]</code> where <code>episode</code> is the ID of the Episode in the database.</p>
            <p><strong>Method</strong> : <code>GET</code></p>
            <h2 id="success-responses">Success Responses</h2>
            <p><strong>Condition</strong> : Retreive episodes</p>
            <p><strong>Code</strong> : <code>200 OK</code></p>
            <p><strong>Content</strong> : </p>
            <pre><code class="lang-json">[
    {
        <span class="hljs-attr">"id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"episode_id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"comment"</span>: <span class="hljs-string">"third comment"</span>,
        <span class="hljs-attr">"ip"</span>: <span class="hljs-string">"127.0.0.1"</span>,
        <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2019-07-07 20:07:17"</span>
    },
]
</code></pre>
            <h2 id="error-response">Error Response</h2>
            <p><strong>Condition</strong> : Wrong Api is Entered</p>
            <p><strong>Code</strong> : <code>404 NOT FOUND</code></p>
            <p><strong>Content</strong> :</p>
            <pre><code class="lang-json">{
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"404 Not Found"</span>,
    <span class="hljs-attr">"status_code"</span>: <span class="hljs-number">404</span>
}
</code></pre>
            <h1 id="characters-list">Characters list</h1>
            <p>Retrieve characters For an Episode</p>
            <p><strong>URL</strong> : &#39;/api/episode/:episode/characters&#39;</p>
            <p><strong>URL Parameters</strong> : <code>episode=[integer]</code> where <code>episode</code> is the ID of the Episode in the database.</p>
            <p><strong>Method</strong> : <code>GET</code></p>
            <h2 id="success-responses">Success Responses</h2>
            <p><strong>Condition</strong> : Retreive characters by episodes</p>
            <p><strong>Code</strong> : <code>200 OK</code></p>
            <p><strong>Content</strong> : </p>
            <pre><code class="lang-json">[
    {
        <span class="hljs-attr">"id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Rick Sanchez"</span>,
        <span class="hljs-attr">"status"</span>: <span class="hljs-string">"Alive"</span>,
        <span class="hljs-attr">"species"</span>: <span class="hljs-string">"Human"</span>,
        <span class="hljs-attr">"type"</span>: <span class="hljs-string">""</span>,
        <span class="hljs-attr">"gender"</span>: <span class="hljs-string">"Male"</span>,
        <span class="hljs-attr">"origin"</span>:{
        <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Earth (C-137)"</span>,
        <span class="hljs-attr">"url"</span>: <span class="hljs-string">"https://rickandmortyapi.com/api/location/1"</span>
        },
        <span class="hljs-attr">"location"</span>:{
        <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Earth (Replacement Dimension)"</span>,
        <span class="hljs-attr">"url"</span>: <span class="hljs-string">"https://rickandmortyapi.com/api/location/20"</span>
        },
        <span class="hljs-attr">"image"</span>: <span class="hljs-string">"https://rickandmortyapi.com/api/character/avatar/1.jpeg"</span>,
        <span class="hljs-attr">"episode"</span>:[<span class="hljs-string">"https://rickandmortyapi.com/api/episode/1"</span>, <span class="hljs-string">"https://rickandmortyapi.com/api/episode/2"</span>,…],
        <span class="hljs-attr">"url"</span>: <span class="hljs-string">"https://rickandmortyapi.com/api/character/1"</span>,
        <span class="hljs-attr">"created"</span>: <span class="hljs-string">"2017-11-04T18:48:46.250Z"</span>
    },
]
</code></pre>
            <h2 id="error-response">Error Response</h2>
            <p><strong>Condition</strong> : Wrong Api is Entered</p>
            <p><strong>Code</strong> : <code>404 NOT FOUND</code></p>
            <p><strong>Content</strong> :</p>
            <pre><code class="lang-json">{
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"404 Not Found"</span>,
    <span class="hljs-attr">"status_code"</span>: <span class="hljs-number">404</span>
}
</code></pre>

        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
