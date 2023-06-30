<?php 
require("koneksi.php");

$perintah = "Select * FROM tbl_novel";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek>0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"]= array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama"] = $get->nama;
        $var["penulis"] = $get->penulis;
        $var["halaman"] = $get->halaman;
        $var["tahun"] = $get->tahun;
        $var["penerbit"] = $get->penerbit;
        $var["sinopsis"] = $get->sinopsis;
        
        
        array_push($response["data"], $var);
    }
}
else{
    $response["kode"] = 0;
    $respone["pesan"] = "Data Tidak Tersedia";
}


echo json_encode($response);
mysqli_close($connect);