<?php 

$con = mysqli_connect("localhost","root","","proyek_soa");
$sql = "SELECT * FROM image WHERE id = 8";
$res = mysqli_query ($con,$sql); //$db->query($sql);
$result=mysqli_fetch_array($res);
echo '<img src="data:'.$result['tipe'].';base64,'.base64_encode($result['data']).'"/>';
//echo '<img src="data:'.$result['tipe'].';base64,'.base64_encode($result['data']).'" />';
//echo "data: $mime". $result['$data'];
//echo '<img src="data:image/png;base64,'.base64_decode($result['data']).'">';
?>