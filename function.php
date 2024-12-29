<?php
session_start();
//membuat koneksi
$conn = mysqli_connect("localhost","root","","stokbarang");

// menambah barang baru
if(isset($_POST['addnewbarang'])){
    mysqli_query($conn,"insert into stock set
    namabarang = '$_POST[namabarang]',
    deskripsi = '$_POST[deskripsi]',
    stock = '$_POST[stock]'");
};

//Menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang= '$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahstockdenganquantity = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, keterangan, qty) values('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock= '$tambahstockdenganquantity' where idbarang='$barangnya'");
}

// menambah barang keluar
if(isset($_POST['addnewbarang'])){
    mysqli_query($conn,"insert into stock set
    namabarang = '$_POST[namabarang]',
    deskripsi = '$_POST[deskripsi]',
    stock = '$_POST[stock]'");
};

//Menambah barang masuk
if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang= '$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahstockdenganquantity = $stocksekarang-$qty;

    $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, penerima, qty) values('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock= '$tambahstockdenganquantity' where idbarang='$barangnya'");
}

?>