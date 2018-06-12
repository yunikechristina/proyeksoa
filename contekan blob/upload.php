<?php
require "cekSession.php";

$con = mysqli_connect("localhost","root","","lantern");

if (isset($_POST['keterangan'])) {
//if ($_POST) {
  $filedata = addslashes(fread(fopen($_FILES['berkas']['tmp_name'], 'r'), $_FILES['berkas']['size']));
  $allowedExts = array("gif", "jpeg", "jpg", "png", "ppt", "pptx", "docx", "doc");
  $temp = explode(".", $_FILES["berkas"]["name"]);
  $extension = end($temp);

  if ((($_FILES["berkas"]["type"] == "image/gif")
  || ($_FILES["berkas"]["type"] == "image/jpeg")
  || ($_FILES["berkas"]["type"] == "image/jpg")
  || ($_FILES["berkas"]["type"] == "image/ppt")
  || ($_FILES["berkas"]["type"] == "image/pptx")
  || ($_FILES["berkas"]["type"] == "image/docx")
  || ($_FILES["berkas"]["type"] == "image/doc")
  || ($_FILES["berkas"]["type"] == "image/png"))
  && ($_FILES["berkas"]["size"] < 200000)
  && in_array($extension, $allowedExts)) {
    if ($_FILES["berkas"]["error"] > 0) {
      echo "Error: " . $_FILES["berkas"]["error"] . "<br>";
    } else {
      echo "Upload: " . $_FILES["berkas"]["name"] . "<br>";
      echo "Type: " . $_FILES["berkas"]["type"] . "<br>";
      echo "Size: " . ($_FILES["berkas"]["size"] / 1024) . " kB<br>";
      echo "Stored in: " . $_FILES["berkas"]["tmp_name"];
    if (file_exists("image/" . $_FILES["berkas"]["name"])) {
        echo $_FILES["berkas"]["name"] . " already exists. ";
      } else {
        move_uploaded_file($_FILES["berkas"]["tmp_name"],
        "" . $_FILES["berkas"]["name"]);
        echo "Stored in: " . "image/" . $_FILES["berkas"]["name"];
      }
     
     $tipe  = $_FILES['berkas']['type'];
     $ukuran = $_FILES['berkas']['size'];
     $nama_file1 = $_FILES['berkas']['name'];
     $nama_file = "".$nama_file1;
     $keterangan = $_POST['keterangan'];
     echo $_POST['idmatkul']."  tre   ";
     //$idass = $_POST['idmatkul'];
     //echo $idass."    asd";
     echo $nama_file1;
     
     //$result = "insert into upload values ('', '$nama_file', '$tipe','$filedata', '$keterangan', $ukuran)";
     //ID ID_Ass  nama_file tipe_file data  deskripsi ukuran
     $dataa=base64_encode($filedata);
     //$result = "insert into question_file values ('', $idass, '$nama_file', '$tipe','$dataa', '$keterangan', $ukuran)"; untuk assignment
     //ID ID_Kelas  nama_file tipe_file data  deskripsi ukuran utk course
     if($_SESSION['tipe']=="dosen"){
     $cek = $_SESSION['id'];
     $query = mysqli_query($con, "select * from kelas join guru on kelas.ID = guru.ID_Kelas where guru.ID = $cek");
     $kelasDosen = mysqli_fetch_row($query);
     echo $kelasDosen[0]."kelas";
     }
     $result = "insert into course values ('', $kelasDosen[0], '$nama_file', '$tipe','$dataa', '$keterangan', $ukuran)";
     echo $result;
     $resultdosen=mysqli_query($con,$result);

     echo "<script type=\"text/javascript\"> window.location.href = 'home.php'; changePage('coursesajax.php'); window.alert('Upload success!');</script>";
    }
  } 
  else {
    //echo "Invalid file";
    echo "<script type=\"text/javascript\"> window.location.href = 'home.php'; changePage('coursesajax.php'); window.alert('Invalid file!');</script>";
  }
}
?>