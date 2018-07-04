<?php

class Database {
    public $con, $cin;

    function __construct(){
        $this->con = mysqli_connect("localhost", "root", "", "proyek_soa");
        $this->cin = mysqli_connect("192.168.254.216", "root", "", "trailer_soa");
    }
};

?>
