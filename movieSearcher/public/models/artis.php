<?php

class artis{
  public $db;
  public $id;
  public $nama;

  public function __construct($db){
      $this->db = $db;
  }

  public function load($id) {
    $sql = "SELECT * FROM artis WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    $data = mysqli_fetch_assoc($res);
    $this->id = $data['id'];
    $this->nama = $data['nama'];
  }

  public function load_all() {
    $sql = "SELECT * FROM artis";
    $res = mysqli_query($this->db->con, $sql);
    $return = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $return[] = $row;
    }
    return $return;
  }

  public function get_data() {
    return array(
      'id'=>$this->id,
      'nama'=>$this->nama
    );
  }

  public function add_artis($nama){
    $sql = "INSERT INTO artis VALUES(default, '".$nama."')";
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Add artis to Database');
    }
  }

public function edit_artis($nama){{
    $sql = "UPDATE artis SET nama='".$nama. "' WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit artis to Database');
    }
  }
}

public function delete_artis(){
   $sql = "DELETE FROM artis WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res) {
      return array('status'=>1, 'msg'=>'Success');
    } else {
      return array('status'=>0, 'msg'=>"Cannot delete movie to DB");
    }
}

public function search_artis_by_nama($nama){
    $sql = "SELECT * FROM artis WHERE nama LIKE '%".$nama."%'";
    $res = mysqli_query($this->db->con, $sql);
    $return = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $return[] = $row;
    }
    return $return;
  }

};

//require_once '../database.php';
//$db = new Database();
//$movie = new artis($db);
//print_r($movie->search_artis_by_nama('ch'));
//print_r($movie->load_all());
//print_r($movie->add_artis("Yunike Christina"));
//print_r($movie->add_artis("Claudia Jason"));
//print_r($movie->load(5));
//print_r($movie->get_data());
//print_r($movie->edit_artis("Odi"));
//print_r($movie->delete_artis());

 ?>
