<?php
require("koneksi.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $penulis = $_POST["penulis"];
    $halaman = $_POST["halaman"];
    $tahun = $_POST["tahun"];
    $penerbit = $_POST["penerbit"];
    $sinopsis = $_POST["sinopsis"];
    
    $perintah = "UPDATE tbl_novel SET nama = '$nama', penulis = '$penulis', halaman = '$halaman', tahun = '$tahun', penerbit = '$penerbit', sinopsis = '$sinopsis' 
                WHERE id = '$id'";
    $eksekusi = mysqli_query($connect,$perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan, Gagal Mengubah Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);
?>