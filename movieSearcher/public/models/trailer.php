<?php

class trailer{
	public $db;
	public $id;
	public $link;
	public $id_movie;

	public function __construct($db){
    	$this->db = $db;
  	}

  	public function load($id) {
    	$sql = "SELECT * FROM trailer WHERE id = ".$id;
    	$res = mysqli_query($this->db->cin, $sql);
    	$data = mysqli_fetch_assoc($res);
    	$this->id = $data['id'];
    	$this->link = $data['link'];
    	$this->id_movie = $data['id_movie'];
  	}

  	public function load_all() {
    	$sql = "SELECT * FROM trailer";
    	$res = mysqli_query($this->db->cin, $sql);
    	$return = array();
   		while ($row = mysqli_fetch_assoc($res)) {
      		$return[] = $row;
    	}
    	return $return;
  	}

  	public function get_data() {
    	return array(
      		'id'=>$this->id,
      		'link'=>$this->link,
      		'id_movie'=>$this->id_movie
    	);
  	}

  	public function add_trailer($link,$id_movie){
      $link = 'https://www.youtube.com/embed/'.$link;
    	$sql = "INSERT INTO trailer VALUES(default, '".$link."',".$id_movie.")";
   		$res = mysqli_query($this->db->cin, $sql);
    	if ($res){
        	return array('status' => 1, 'msg' => 'Success');
    	}else{
        	return array('status' => 0, 'msg' => 'Cannot Add trailer to Database');
    	}
  	}

  	public function edit_trailer($link,$id_movie){
      $link = 'https://www.youtube.com/embed/'.$link;
    	$sql = "UPDATE trailer SET link='".$link."', id_movie=".$id_movie." WHERE id =".$this->id;
    	$res = mysqli_query($this->db->cin, $sql);
    	if ($res){
        	return array('status' => 1, 'msg' => 'Success');
    	}else{
        	return array('status' => 0, 'msg' => 'Cannot Edit trailer to Database');
    	}
  	}

  	public function delete_trailer(){
   		$sql = "DELETE FROM trailer WHERE id =".$this->id;
    	$res = mysqli_query($this->db->cin, $sql);
    	if ($res) {
      		return array('status'=>1, 'msg'=>'Success');
    	} else {
      		return array('status'=>0, 'msg'=>"Cannot delete trailer to DB");
   		}
	}

	public function search_trailer_by_movie($id_movie){
    	$sql = "SELECT * FROM trailer WHERE id_movie = ".$id_movie;
    	$res = mysqli_query($this->db->cin, $sql);
    	$return = array();
    	while ($row = mysqli_fetch_assoc($res)) {
     		 $return[] = $row;
    	}
    	return $return;
  	}
};
// require_once '../database.php';
// $db = new Database();
// $movie = new trailer($db);
// print_r(json_encode($movie->search_trailer_by_movie(1)));
?>