<?php
$con = mysqli_connect("localhost","root","","lantern");
$query = mysqli_query($con,"SELECT * FROM question_file");

$fileID = $_GET['id'];
echo $fileID;
//$data = mysqli_query ($con, "select * from upload where id=$fileID");
//ID	ID_Ass	nama_file	tipe_file	data	deskripsi	ukuran
//$data = mysqli_query ($con, "select * from question_file where id=$fileID");
$data = mysqli_query ($con, "select * from course where id=$fileID");

if ($row = mysqli_fetch_assoc($data))
{
   $filename = $row['nama_file'];
   $filetype = $row['tipe_file'];
   $filedata = $row['data'];
   $deskripsi = $row['deskripsi'];
   $filesize = $row['ukuran'];
}
 
//header('Content-type: ' . $filetype);
//header('Content-length: ' . $filesize);
header("Content-Transfer-Encoding: binarynn");
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Disposition: attachment; filename="' . $filename . '"');
echo $filedata;
exit();
?>