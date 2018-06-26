<?php
$con = mysqli_connect("localhost","root","","proyek_soa");

if (isset($_POST['keterangan'])) {
  $filedata = addslashes(fread(fopen($_FILES['berkas']['tmp_name'], 'r'), $_FILES['berkas']['size']));
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["berkas"]["name"]);
  $extension = end($temp);

  if ((($_FILES["berkas"]["type"] == "image/gif")
  || ($_FILES["berkas"]["type"] == "image/jpeg")
  || ($_FILES["berkas"]["type"] == "image/jpg")
  || ($_FILES["berkas"]["type"] == "image/png"))
  && ($_FILES["berkas"]["size"] < 200000)
  && in_array($extension, $allowedExts)) {

  $filedata = addslashes(fread(fopen($_FILES['berkas']['tmp_name'], 'r'), $_FILES['berkas']['size']));
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["berkas"]["name"]);
  $extension = end($temp);

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
     //$keterangan = $_POST['keterangan'];
     //echo $_POST['idmatkul']."  tre   ";
     //echo $nama_file1;
     
     $dataa=$filedata;
     
     $result = "INSERT INTO image VALUES(default, '".$nama_file."','".$tipe."','".$dataa."',".$ukuran.",1)";
     //echo $result;
     $res = mysqli_query($con,$result);
     echo "test";
       if ($res){
          echo "sukses";
      }else{
          echo "gagal";
      }
     }
      } 
  else {
   echo "Invalid file";
  }
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
   <form action="upload_modified.php" method="post" enctype="multipart/form-data">
    <input type="file" name="berkas" accept=".gif,.jpeg,.jpg,.png">
      <a href="assignment.php">
    
      <button type="submit" name="keterangan">Submit</button>
    </form>
</body>
</html>