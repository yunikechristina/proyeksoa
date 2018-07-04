<?php

class Database {
    public $con, $con2;

    function __construct(){
        $this->con = mysqli_connect("localhost", "root", "", "proyek_soa");
        $this->con2 = mysqli_connect("localhost", "root", "", "trailer_soa");

    }
};

?>
