<?php

class user{
  public $db;
  public $id;
  public $nama;
  public $email;
  public $password;
  public $status;
  public $subscribe;

  public function __construct($db){
      $this->db = $db;
  }

  public function load($id) {
    $sql = "SELECT * FROM user WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    $data = mysqli_fetch_assoc($res);
    $this->id = $data['id'];
    $this->nama = $data['nama'];
    $this->email = $data['email'];
    $this->password = $data['password'];
    $this->status = $data['status'];
    $this->subscribe = $data['subscribe'];
  }

  public function load_all() {
    $sql = "SELECT * FROM user";
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
      'nama'=>$this->nama,
      'email'=>$this->email,
      'password'=>$this->password,
      'status'=>$this->status,
      'subscribe'=>$this->subscribe
    );
  }

  public function register($nama, $email, $password, $status, $subscribe){
    $password = md5($password);
    $sql = "INSERT INTO user VALUES(default, '".$nama."','".$email."','".$password."','".$status."','".$subscribe."')";
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Add Data to Database');
    }
  }

  public function login($email,$password){
    $sql = "SELECT password FROM user WHERE email = '".$email."'";
    $res = mysqli_query($this->db->con, $sql);
    $row = mysqli_fetch_assoc($res);
    if(md5($password)==$row['password']){
      return array('status' => 1, 'msg' => 'Success');
    }else{
      return array('status' => 0, 'msg' => 'Email or password failed');
    }
  }

  public function update_user($nama, $email, $password, $subscribe){
    $password = md5($password);
    $sql = "UPDATE user SET nama = '".$nama."', email = '".$email."', password = '".$password."', subscribe = '".$subscribe."' WHERE id = ".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit Data in Database');
    }
  }

  public function subscribe($subscribe){
    $sql = "SELECT subscribe FROM user WHERE id = ".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if($res = 'true'){
      $sql = "UPDATE user SET subscribe = 'false' WHERE id = ".$this->id;
      $res = mysqli_query($this->db->con, $sql);
      if ($res){
          return array('status' => 1, 'msg' => 'Success');
      }else{
          return array('status' => 0, 'msg' => 'Cannot Edit Data in Database');
      }
    }else{
      $sql = "UPDATE user SET subscribe = 'true' WHERE id = ".$this->id;
      $res = mysqli_query($this->db->con, $sql);
      if ($res){
          return array('status' => 1, 'msg' => 'Success');
      }else{
          return array('status' => 0, 'msg' => 'Cannot Edit Data in Database');
      }
    }

  }

  public function delete_user(){
   $sql = "DELETE FROM user WHERE id =".$this->id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res) {
      return array('status'=>1, 'msg'=>'Success');
    } else {
      return array('status'=>0, 'msg'=>"Cannot delete user to DB");
    }
  }
};

//require_once '../database.php';
//$db = new Database();
//$movie = new user($db);
//register($nama, $email, $password, $status, $subscribe)
//print_r(json_encode($movie->register("budi", "budi@gmail.com", "budi", "user", "false")));

//login($email,$password)
//print_r(json_encode($movie->login("satria@gmail.com", "satria")));

//update_user($nama, $email, $password, $subscribe,$id)
//$movie->load(4);
//print_r($movie->update_user("amanda","amanda@gmail.com","amanda","true"));
//subscribe($subscribe,$id)
//print_r($movie->load_all());
//print_r($movie->add_detail_artis("Sherlock",1,1));
//print_r($movie->add_detail_artis("Hehe",2,2));

//print_r($movie->load(4));
//print_r($movie->get_data());
//print_r($movie->edit_detail_artis("Thor ganteng", 1, 2));
//print_r($movie->delete_user());

?>
