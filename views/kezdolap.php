<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kezdőlap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="text-bg-dark">

    <?php include("nav.php") ?>

    <main class="container-lg">
        <section class="row">
            <article class="col">
                <h1>Csapatok</h1>
            </article>
            <article class="col-12 d-flex flex-column gap-2">
                <?php
                    foreach($this->orszagLista() as $id => $orszag) {
                        echo '<div><a class="link-light link-underline-opacity-0 link-underline-opacity-100-hover link-offset-2" href="?page=eredmenyekView&id='.($id + 1).'">'.$orszag["orszag"].'</a></div>';
                    }
                ?>
            </article>
        </section>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>