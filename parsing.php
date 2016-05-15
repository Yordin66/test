<?php
//memberi pengalamatan khusus untuk json
header('Content-type: application/json');
//memanggil database
$host="localhost";
$user="root";
$password="";	
$koneksi=mysql_connect($host,$user,$password) or die("Gagal Koneksi Bro !");
mysql_select_db("cewek");
//query data
$sql = "SELECT id, namacewek AS namaceweknya FROM cewek ORDER BY id ";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());
//fetch dalam bentuk array
$records = array();
while($row = mysql_fetch_assoc($result)) {
	$records[] = $row;
}
//menuliskannya dalam bentuk json menggunakan fungsi json_encode
echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';
?>