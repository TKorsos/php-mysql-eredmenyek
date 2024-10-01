<?php

namespace controllers;

class UserController {
    use \traits\Utilities;

    function kezdolapView() {
        $this->getViewFile("kezdolap");
    }

    function eredmenyekView() {
        $this->getViewFile("eredmenyek");
    }

    function meccsView() {
        $this->getViewFile("meccs");
    }

    function eredmenyekProcess($orszag_id) {
        $sql = mysqli_query($this->connectDB(), "select * from foci where hazai_id = '$orszag_id' or vendeg_id = '$orszag_id' ");
        while($data = mysqli_fetch_assoc($sql)) {
            $eredmenyek_arr[] = $data;
        }

        return $eredmenyek_arr;
    }

    function orszagLista() {
        $orszagok = mysqli_query($this->connectDB(), "select * from orszagok");

        while($orszag = mysqli_fetch_assoc($orszagok)) {
            $orszag_arr[] = $orszag;
        }

        return $orszag_arr;
    }

    function orszag($index) {
        $orszagok = mysqli_query($this->connectDB(), "select * from orszagok where id = '".$index."' ");

        $orszag = mysqli_fetch_assoc($orszagok);

        return $orszag;
    }

    function merkozesTipus($index) {
        $tipusok = mysqli_query($this->connectDB(), "select * from tipus where id = '".$index."' ");

        $tipus = mysqli_fetch_assoc($tipusok);

        return $tipus;
    }

}