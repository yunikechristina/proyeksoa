<?php
$con = mysqli_connect("localhost","root","","proyek_soa");
//$query = mysqli_query($con,"SELECT * FROM image");
//$fileID = $_GET['id'];
//echo $fileID;
//$data = mysqli_query ($con, "SELECT * FROM image WHERE id=$fileID");
$res = mysqli_query ($con, "SELECT * FROM image WHERE id=8;");

if ($row = mysqli_fetch_assoc($res))
{ 
    $name = $row['nama_file'];
    $size =  $row['ukuran'];
    $type = $row['tipe'];
    $filedata = $row['data'];
}

header("Content-type: ".$type);
header('Content-Disposition: attachment; filename="'.$name.'"');
header("Content-Transfer-Encoding: binary"); 
header('Expires: 0');
header('Pragma: no-cache');
header("Content-Length: ".$size);

echo $filedata;
exit();
?>