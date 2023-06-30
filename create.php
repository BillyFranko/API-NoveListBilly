<?php
require("koneksi.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = $_POST["nama"];
    $penulis = $_POST["penulis"];
    $halaman = $_POST["halaman"];
    $tahun = $_POST["tahun"];
    $penerbit = $_POST["penerbit"];
    $sinopsis = $_POST["sinopsis"];
    
    $perintah = "INSERT INTO tbl_novel(nama,penulis,halaman,tahun,penerbit,sinopsis) VALUES ('$nama', '$penulis', '$halaman', '$tahun', '$penerbit', '$sinopsis')";
    
    $eksekusi = mysqli_query($connect,$perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan, Gagal Menyimpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);
?>