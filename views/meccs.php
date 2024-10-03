<?php

$orszag_id = $_GET["orszagid"];
$meccs_id = $_GET["meccsid"];

?>
<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->orszag($orszag_id)["orszag"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="text-bg-dark">

<main class="container-lg py-5 px-4">
    <?php
    foreach($this->eredmenyekProcess($orszag_id) as $key => $data) {
        if($data["id"] == $meccs_id) {
            echo '<section class="row">
                    <article class="col-auto">
                        <a class="d-flex flex-column align-items-center link-light link-underline-opacity-0 link-underline-opacity-100-hover link-offset-2" href="?page=eredmenyekView&id='.$data["hazai_id"].'">
                            <span>
                                <img src="./assets/imgs/flags/'.$data["hazai_id"].'.png">
                            </span>
                            <span class="'.($data["hazai_gol"] > $data["vendeg_gol"] ? "fw-bold" : "").'">
                                '.$this->orszag($data["hazai_id"])["orszag"].'
                            </span>
                        </a>
                    </article>
                    <article class="col">';
                        if($data["vegkimenetel_tipus"] == 0) {
                            echo '<div class="d-flex flex-column justify-content-between align-items-center">
                                <div>'.$data["datum"].'</div>
                                <div>'.$data["hazai_gol"].' - '.$data["vendeg_gol"].'</div>
                                <div class="text-uppercase">Vége</div>
                            </div>';
                        }
                        else {
                            echo '<div class="d-flex flex-column justify-content-between align-items-center">
                                <div>'.$data["datum"].'</div>
                                <div>'.$data["hazai_gol"].' - '.$data["vendeg_gol"].'</div>
                                <div>('.$data["hosszabbitas_hazai"].' - '.$data["hosszabbitas_vendeg"].')</div>
                                <div class="text-uppercase">'.($data["vegkimenetel_tipus"] == 1 ? "Hosszabbítás után" : "Büntetők után").'</div>
                            </div>';
                        }
                    echo '</article>
                    <article class="col-auto">
                        <a class="d-flex flex-column align-items-center link-light link-underline-opacity-0 link-underline-opacity-100-hover link-offset-2" href="?page=eredmenyekView&id='.$data["vendeg_id"].'">
                            <span>
                                <img src="./assets/imgs/flags/'.$data["vendeg_id"].'.png">
                            </span>
                            <span class="'.($data["hazai_gol"] < $data["vendeg_gol"] ? "fw-bold" : "").'">'
                                .$this->orszag($data["vendeg_id"])["orszag"].'
                            </span>
                        </a>
                    </article>
                </section>';
        }
    }  
    ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>