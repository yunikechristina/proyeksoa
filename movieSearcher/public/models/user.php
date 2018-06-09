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
    if(password_verify($password, $res)){
      return array('status' => 1, 'msg' => 'Success');
    }else{
      return array('status' => 0, 'msg' => 'email or password failed');
    }
  }

  public function update_user($nama, $email, $password, $subscribe,$id){
    $password = md5($password);
    $sql = "UPDATE user SET nama = '".$nama."', email = '".$email."', password = '".$password."', subscribe = '".$subscribe."' WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    if ($res){
        return array('status' => 1, 'msg' => 'Success');
    }else{
        return array('status' => 0, 'msg' => 'Cannot Edit Data in Database');
    }
  }

  public function subscribe($subscribe,$id){
    $sql = "SELECT subscribe FROM user WHERE id = ".$id;
    $res = mysqli_query($this->db->con, $sql);
    if($res = 'true'){
      $sql = "UPDATE user SET subscribe = 'false' WHERE id = ".$id;
      $res = mysqli_query($this->db->con, $sql);
      if ($res){
          return array('status' => 1, 'msg' => 'Success');
      }else{
          return array('status' => 0, 'msg' => 'Cannot Edit Data in Database');
      }
    }else{
      $sql = "UPDATE user SET subscribe = 'true' WHERE id = ".$id;
      $res = mysqli_query($this->db->con, $sql);
      if ($res){
          return array('status' => 1, 'msg' => 'Success');
      }else{
          return array('status' => 0, 'msg' => 'Cannot Edit Data in Database');
      }
    }

  }
};

?>
