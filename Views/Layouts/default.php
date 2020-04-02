<!doctype html>
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 5rem;
        }

        .starter-template {
            padding: 3rem 1.5rem;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="/" class="nav-link">List</a></li>
            <li><a href="/tasks/create/" class="nav-link"><b>+</b> Add new task</a></li>
            <?php if ($_SESSION['admin']) { ?>
                <li><a class="nav-link" href="/login/quit">logout</span></a></li>
            <? } else { ?>
                <li><a class="nav-link" href="/login/enter">login</span></a></li>
            <? } ?>

        </ul>
    </div>
</nav>

<main role="main" class="container">
    <div class="starter-template">
        <?= $content_for_layout; ?>
    </div>
</main>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"/>
</body>
</html>
