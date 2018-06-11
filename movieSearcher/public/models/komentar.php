<?php

class komentar{
  public $db;
  public $id;
  public $komen;
  public $id_user;
  public $id_movie;

  public function __construct($db){
      $this->db = $db;
  }

  public function load($id) {
    $sql = "SELECT * FROM komentar WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    $data = mysqli_fetch_assoc($res);
    $this->id = $data['id'];
    $this->komen = $data['komen'];
    $this->id_user = $data['id_user'];
    $this->id_movie = $data['id_movie'];
  }

  public function load_all() {
    $sql = "SELECT * FROM komentar";
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
      'komen'=>$this->komen,
      'id_user'=>$this->id_user,
      'id_movie'=>$this->id_movie
    );
  }

  public function add_komentar($komen, $id_user, $id_movie){
    $sql = "INSERT INTO komentar VALUES(default, '".$komen."',".$id_user.",'".$id_movie."')";
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Add COmment to Database');
    }
  }

public function edit_komentar($komen, $id_user, $id_movie){{
    $sql = "UPDATE komentar SET komen='".$komen. "', id_user='".$id_user."', id_movie='".$id_movie. "' WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit Comment to Database');
    }
  }
}

public function delete_komentar(){
   $sql = "DELETE FROM komentar WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res) {
      return array('status'=>1, 'msg'=>'Success');
    } else {
      return array('status'=>0, 'msg'=>"Cannot delete movie to DB");
    }
}

public function search_komentar_by_komen($komen){
    $sql = "SELECT * FROM komentar WHERE komen LIKE '%".$komen."%'";
    $res = mysqli_query($this->db->con, $sql);
    $return = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $return[] = $row;
    }
    return $return;
  }

public function search_komentar_by_user($id_user){
  $sql = "SELECT * FROM komentar WHERE id_user=".$id_user;
  $res = mysqli_query($this->db->con, $sql);
  $return = array();
  while ($row = mysqli_fetch_assoc($res)) {
    $return[] = $row;
  }
  return $return;
}

public function search_komentar_by_movie($id_movie){
  $sql = "SELECT * FROM komentar WHERE id_movie=".$id_movie;
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
//$movie = new komentar($db);
//print_r($movie->search_komentar_by_komen('je'));
//print_r($movie->search_komentar_by_user(3));
//print_r($movie->search_komentar_by_movie(2));
//print_r($movie->load_all());
//print_r($movie->add_komentar("gils keren bezz",2,3));

//print_r($movie->load(4));
//print_r($movie->get_data());
//print_r($movie->edit_komentar("Thor ganteng", 1, 3));
//print_r($movie->delete_komentar());

 ?>
