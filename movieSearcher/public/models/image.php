<?php

class image{
  public $db;
  public $id;
  public $nama_file;
  public $tipe;
  public $dataa;
  public $ukuran;
  public $id_movie;

  public function __construct($db){
      $this->db = $db;
  }

  public function load($id) {
    $sql = "SELECT * FROM image WHERE id = ".$id;
    //$result=mysqli_fetch_array($res);
    //echo '<img src="data:'.$result['tipe'].';base64,'.base64_encode($result['data']).'"/>';

    $res = mysqli_query($this->db->con, $sql);
    $data = mysqli_fetch_assoc($res);
    $this->id = $data['id'];
    $this->nama_file = $data['nama_file'];
    $this->tipe = $data['tipe'];
    $this->dataa = $data['dataa'];
    $this->id_movie = $data['id_movie'];
  }

  public function load_all() {
    $sql = "SELECT * FROM image";
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
      'nama_file'=>$this->nama_file,
      'tipe'=>$this->tipe,
      'dataa'=>$this->dataa,
      'id_movie'=>$this->id_movie
    );
  }

  public function add_image($nama_file, $tipe, $dataa, $ukuran, $id_movie){
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename = pathinfo($uploadedFile->getClientFilename(), PATHINFO_FILENAME);
   
    $filename = sprintf('%s.%0.8s', $basename, $extension);
     $sql = "INSERT INTO image VALUES(default, '".$nama_file."','".$tipe."',".$dataa.",'".$ukuran.",'".$id_movie."')";
   
    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
     $res = mysqli_query($this->db->con,$sql);
        if($res){
            return array('status' => 1,'msg' => 'Success');
        }else{
            return array('status' => 0,'msg' => 'Cannot Upload Image to Database');
        }
    return $filename;
  }

public function download($id){
  $res = mysqli_query ($con, "SELECT * FROM image WHERE id=".$id);
  
    $response=$res->withHeader('Content-Description', 'File Transfer')
   ->withHeader('Content-Type', 'application/octet-stream')
   ->withHeader('Content-Disposition', 'attachment;filename="'.basename($file).'"')
   ->withHeader('Expires', '0')
   ->withHeader('Cache-Control', 'must-revalidate')
   ->withHeader('Pragma', 'public')
   ->withHeader('Content-Length', filesize($file));

  readfile($file);
  return $response;
}

public function edit_image($nama_file, $tipe, $dataa, $ukuran, $id_movie){{
    $sql = "UPDATE image SET nama_file='".$nama_file. "', tipe='".$tipe. "', dataa=".$dataa. ", ukuran=".$ukuran. ", id_movie='".$id_movie. "' WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit image to Database');
    }
  }
}

public function delete_image(){
   $sql = "DELETE FROM image WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res) {
      return array('status'=>1, 'msg'=>'Success');
    } else {
      return array('status'=>0, 'msg'=>"Cannot delete movie to DB");
    }
}

public function search_image_by_nama_file($nama_file){
    $sql = "SELECT * FROM image WHERE nama_file LIKE '%".$nama_file."%'";
    $res = mysqli_query($this->db->con, $sql);
    $return = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $return[] = $row;
    }
    return $return;
  }

public function search_image_by_movie($id_movie){
  $sql = "SELECT * FROM image WHERE id_movie=".$id_movie;
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
//$movie = new image($db);
//print_r($movie->search_image_by_nama_file('je'));
//print_r($movie->search_image_by_user(3));
//print_r($movie->search_image_by_movie(2));
//print_r($movie->load_all());
//print_r($movie->add_image("gils keren bezz",2,3));

//print_r($movie->load(4));
//print_r($movie->get_data());
//print_r($movie->edit_image("Thor ganteng", 1, 3));
//print_r($movie->delete_image());
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
   <input type="file" name="pic" accept=".gif,.jpeg,.png,.jpg">
      <a href="assignment.php">
      <button>Submit belum ajax</button>
</body>
</html>