<?php
session_start();
// jika belum login
if(isset($_SESSION['login'])){

} else {
    header('location:login.php');
};
?>