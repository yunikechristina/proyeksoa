<?php

class detail_artis{
  public $db;
  public $id;
  public $peran;
  public $id_artis;
  public $id_movie;

  public function __construct($db){
      $this->db = $db;
  }

  public function load($id) {
    $sql = "SELECT * FROM detail_artis WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    $data = mysqli_fetch_assoc($res);
    $this->id = $data['id'];
    $this->peran = $data['peran'];
    $this->id_artis = $data['id_artis'];
    $this->id_movie = $data['id_movie'];
  }

  public function load_all() {
    $sql = "SELECT * FROM detail_artis";
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
      'peran'=>$this->peran,
      'id_artis'=>$this->id_artis,
      'id_movie'=>$this->id_movie
    );
  }

  public function add_detail_artis($peran, $id_artis, $id_movie){
    $sql = "INSERT INTO detail_artis VALUES(default, '".$peran."',".$id_artis.",'".$id_movie."')";
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Add detail_artis to Database');
    }
  }

public function edit_detail_artis($peran, $id_artis, $id_movie){{
    $sql = "UPDATE detail_artis SET peran='".$peran. "', id_artis='".$id_artis."', id_movie='".$id_movie. "' WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit detail_artis to Database');
    }
  }
}

public function delete_detail_artis(){
   $sql = "DELETE FROM detail_artis WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res) {
      return array('status'=>1, 'msg'=>'Success');
    } else {
      return array('status'=>0, 'msg'=>"Cannot delete movie to DB");
    }
}

public function search_detail_artis_by_peran($peran){
    $sql = "SELECT * FROM detail_artis WHERE peran LIKE '%".$peran."%'";
    $res = mysqli_query($this->db->con, $sql);
    $return = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $return[] = $row;
    }
    return $return;
  }

public function search_detail_artis_by_artis($id_artis){
  $sql = "SELECT * FROM detail_artis WHERE id_artis=".$id_artis;
  $res = mysqli_query($this->db->con, $sql);
  $return = array();
  while ($row = mysqli_fetch_assoc($res)) {
    $return[] = $row;
  }
  return $return;
}

public function search_detail_artis_by_movie($id_movie){
  $sql = "SELECT * FROM detail_artis WHERE id_movie=".$id_movie;
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
//$movie = new detail_artis($db);
//print_r($movie->search_detail_artis_by_peran('th'));
//print_r($movie->search_detail_artis_by_artis(1));
//print_r($movie->search_detail_artis_by_movie(2));
//print_r($movie->load_all());
//print_r($movie->add_detail_artis("Sherlock",1,1));
//print_r($movie->add_detail_artis("Hehe",2,2));

//print_r($movie->load(4));
//print_r($movie->get_data());
//print_r($movie->edit_detail_artis("Thor ganteng", 1, 2));
//print_r($movie->delete_detail_artis());

 ?>
