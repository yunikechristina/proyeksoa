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

  public function load($id) {
    $sql = "SELECT * FROM movie WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    $data = mysqli_fetch_assoc($res);
    $this->id = $data['id'];
    $this->judul = $data['judul'];
    $this->tahun = $data['tahun'];
    $this->sinopsis = $data['sinopsis'];
    $this->img = $data['img'];
    $this->trailer = $data['trailer'];
    $this->genre = $data['genre'];
  }

  public function load_all() {
    $sql = "SELECT * FROM movie";
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
      'judul'=>$this->judul,
      'tahun'=>$this->tahun,
      'sinopsis'=>$this->sinopsis,
      'img'=>$this->img,
      'trailer'=>$this->trailer,
      'genre'=>$this->genre
    );
  }

  public function add_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre){
    $sql = "INSERT INTO movie VALUES(default, '".$judul."',".$tahun.",'".$sinopsis."','".$img."','".$trailer."','".$genre."')";
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Add Movie to Database');
    }
  }

public function edit_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre){
    $sql = "UPDATE movie SET judul='".$judul. "', tahun='".$tahun."', sinopsis='".$sinopsis. "', img='".$img."', trailer='" .$trailer. "', genre='".$genre."' WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit Movie to Database');
    }
  }

public function delete_movie(){
   $sql = "DELETE FROM movie WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res) {
      return array('status'=>1, 'msg'=>'Success');
    } else {
      return array('status'=>0, 'msg'=>"Cannot delete movie to DB");
    }
}

public function search_movie($name){
    $sql = "SELECT * FROM movie WHERE judul LIKE '%".$name."%'";
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
//$movie = new movie($db);
//print_r($movie->search_movie('z'));
//print_r($movie->load_all());
//add_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre
//print_r($movie->add_movie("Thor: Ragnarok", 2017, "Thor is imprisoned on the planet Sakaar, and must race against time to return to Asgard and stop Ragnarök, the destruction of his world, at the hands of the powerful and ruthless villain Hela.", "", "https://youtu.be/ue80QwXMRHg", "Action, Adventure, Comedy"));

//print_r($movie->load(2));
//print_r($movie->get_data());
//edit_movie($judul,$tahun,$sinopsis,$img,$trailer,$genre)
//print_r($movie->edit_movie("Thor: Ragnarök", 2017, "Thor is imprisoned on the planet Sakaar, and must race against time to return to Asgard and stop Ragnarok, the destruction of his world, at the hands of the powerful and ruthless villain Hela.", "", "https://youtu.be/ue80QwXMRHg", "Action, Adventure, Comedy"));
//print_r($movie->delete_movie());

 ?>
