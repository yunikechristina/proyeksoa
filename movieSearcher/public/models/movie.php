<?php

class movie{
  public $db;
  public $id;
  public $judul;
  public $tahun;
  public $sinopsis;
  public $img;
  public $trailer;
  public $genre;

  public function __construct($db){
      $this->db = $db;
  }
  public function add_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre){
    $sql = "INSERT INTO movie VALUES(default, '".$judul."',".$tahun.",'".$sinopsis."','".$img."','".$trailer."','".$genre."')";
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Add Data to Database');
    }
  }
};
 ?>
