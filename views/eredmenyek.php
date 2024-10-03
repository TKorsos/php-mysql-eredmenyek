<?php

$orszag_id = $_GET["id"];

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
    <header class="container-lg">
        <div class="row">
            <!-- Foci szöveg php-ból attól függően mely sportról van szó -->
            <div class="col-1 text-uppercase">Foci</div>
            <div class="col-auto text-uppercase"><?php echo $this->orszag($orszag_id)["kontinens"]; ?></div>
        </div>
        <div class="row border-top border-bottom">
            <div class="col-auto align-content-center">
                <?php echo '<img src="./assets/imgs/flags/'.$orszag_id.'.png">'; ?>
            </div>
            <div class="col-auto align-content-center">
                <?php echo $this->orszag($orszag_id)["orszag"]; ?>
            </div>
            <div class="col-1 align-content-center">Kedvencek közé</div>
        </div>
        <div class="row">
            <div class="col-2 col-lg-1">Összegzés</div>
            <div class="col-2 col-lg-1">Hírek</div>
            <div class="col-2 col-lg-1 active">Eredmények</div>
            <div class="col-2 col-lg-1">Meccsek</div>
            <div class="col-2 col-lg-1">Csapat</div>
        </div>
    </header>

    <main class="container-lg">
    <?php

    foreach($this->eredmenyekProcess($orszag_id) as $key => $data) {
        /*
            ha a jelenlegi és az előző mérkőzés típus id-je nem egyezik, akkor ez már egy új csoportba kerül, ezesetben jelenjen meg a címsor

            csak az adott ország meccseit mutassa
        */

        if($this->eredmenyekProcess($orszag_id)[$key]["merkozes_tipus_id"] != $this->eredmenyekProcess($orszag_id)[$key - 1]["merkozes_tipus_id"]) {
        echo '
            <section class="row text-bg-secondary">
                <article class="col">'.$this->merkozesTipus($data["merkozes_tipus_id"])["tipus_megnevezes"].'</article>
                <article class="col-2 ms-auto">'.$this->merkozesTipus($data["merkozes_tipus_id"])["tipus_forma"].'</article>
            </section>';
        }

        echo '
            <a class="link-light link-underline-opacity-0" href="?page=meccsView&orszagid='.$orszag_id.'&meccsid='.$data["id"].'" target="_blank">
                <section class="row border-bottom">
                    <article class="col-2 align-content-center">'.$data["datum"].'</article>
                    <article class="col">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">';
                                if($data["hazai_gol"] > $data["vendeg_gol"]) {
                                    echo '<div class="d-flex gap-2 align-items-center">
                                            <img src="./assets/imgs/flags/'.$data["hazai_id"].'.png" width="30px">
                                            <div>
                                                <span class="fw-bold">'.$this->orszag($data["hazai_id"])["orszag"].'</span>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img src="./assets/imgs/flags/'.$data["vendeg_id"].'.png" width="30px">
                                            <div>'
                                                .$this->orszag($data["vendeg_id"])["orszag"].
                                            '</div>
                                        </div>';
                                }
                                elseif($data["hazai_gol"] < $data["vendeg_gol"]) {
                                    echo '<div class="d-flex gap-2 align-items-center">
                                            <img src="./assets/imgs/flags/'.$data["hazai_id"].'.png" width="30px">
                                            <div>'
                                                .$this->orszag($data["hazai_id"])["orszag"].
                                            '</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img src="./assets/imgs/flags/'.$data["vendeg_id"].'.png" width="30px">
                                            <div>
                                                <span class="fw-bold">'.$this->orszag($data["vendeg_id"])["orszag"].'</span>
                                            </div>
                                        </div>';
                                }
                                else {
                                    echo '<div class="d-flex gap-2 align-items-center">
                                            <img src="./assets/imgs/flags/'.$data["hazai_id"].'.png" width="30px">
                                            <div>'
                                                .$this->orszag($data["hazai_id"])["orszag"].
                                            '</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <img src="./assets/imgs/flags/'.$data["vendeg_id"].'.png" width="30px">
                                            <div>'
                                                .$this->orszag($data["vendeg_id"])["orszag"].
                                            '</div>
                                        </div>';
                                }
                                echo '</div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div>'.$data["hazai_gol"].'</div>
                                    <div>'.$data["vendeg_gol"].'</div>
                            </div>
                        </div>
                    </article>
                    <article class="col-2 align-content-center">';
                        /*
                            adott ország részéről kell tekinteni hogy GY, D vagy V

                            feltételbe kell venni az adott országot és hogy a rúgott góljainak száma nagyobb-e vagy sem mint a másiké
                        */
                            if($data["hazai_id"] == $orszag_id && $data["hazai_gol"] > $data["vendeg_gol"] || $data["vendeg_id"] == $orszag_id && $data["hazai_gol"] < $data["vendeg_gol"]) {
                                echo '<span class="text-success">GY</span>';
                            }
                            elseif($data["hazai_id"] == $orszag_id && $data["hazai_gol"] < $data["vendeg_gol"] || $data["vendeg_id"] == $orszag_id && $data["hazai_gol"] > $data["vendeg_gol"]) {
                                echo '<span class="text-danger">V</span>';
                            }
                            else {
                                echo '<span class="text-warning">D</span>';
                            }
                echo '</article>
                </section>
            </a>
        ';
        }

    ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>